<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotion;
use App\Product;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index() {
        $promotions = Promotion::all();
        foreach($promotions as $promotion) {
            $product = Product::find($promotion->pro_id);
            if($promotion->expirationDate < Carbon::today()) {
                $promotion->isBlock = 1;
                $product->newprice = 0;
                $product->save();
                $promotion->save();
            }
            $promotion->product = $product;
        }
        return view('BackEnd.Promotion.index', compact('promotions'));
    }

    public function create() {
        $products = Product::where('isBlock', '0')->where('newprice', '0')->get();
        return view('BackEnd.Promotion.add', compact('products'));
    }

    public function store(Request $request) {
        $product = Product::findOrFail($request->pro_id);
        if($request->expirationDate < $request->beginDate) {
            return redirect()->back()->withErrors([
                'message' => 'La date de fin ne peut pas etre anterieure a la date de debut',
                'label' => 'warning'
            ]);
        }

        if(Carbon::parse($request->expirationDate) < Carbon::now()) {
            return redirect()->back()->withErrors([
                'message' => 'Entrer une date de fin ulterieure a aujourd\'hui',
                'label' => 'warning'
            ]);
        }

        if($request->price > $product->price) {
            return redirect()->back()->withErrors([
                'message' => 'Prix promotion invalide. Entrer un montant inferieur a ' . $product->price . 'XFA',
                'label' => 'warning'
            ]);
        }

        $input = $request->all();        
        $input['price'] = $product->price - $request->price;
        $input['expirationDate'] = Carbon::parse($request->expirationDate);
        if($request->beginDate) {
            $input['beginDate'] = Carbon::parse($request->beginDate);
        }
        $promotion = Promotion::create($input);

        $product->newprice = $promotion->price;
        $product->save();

        return redirect()->route('promotions')->withErrors([
            'message' => 'Nouvelle promotion ajoutee au produit ' . $product->name,
            'label' => 'success'
        ]);
    }

    public function destroy($code) {
        $promotion = Promotion::where('code', $code)->first();
        $product = Product::find($promotion->pro_id);
        $promotion->delete();
        $product->newprice = 0;
        $product->save();

        return response()->json('Promotion supprimee');
    }
}
