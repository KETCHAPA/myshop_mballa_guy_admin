<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\CategoryProduct;
use App\Promotion;

class ProductController extends Controller
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
        $products = Product::all();
        return view('BackEnd.Products.allProducts', compact('products'));
    }

    public function create() {
        $categories = Category::where('isBlock',  0)->get();
        return view('BackEnd.Products.add', compact('categories'));
    }

    public function store(Request $request) {
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path('assets\images\backend\products'), $name);
            
            $input = $request->all();
            $input['photo'] = $name;
            $product = Product::create($input);
            if(!$product) {
                return redirect()->route('products')->withErrors([
                    'message' => 'Impossible d\'ajouter un produit pour l\'instant',
                    'label' => 'danger'
                ]);
            }

            $input2['Pro_id'] = $product->id;
            $input2['Cat_id'] = $request->catId;
            $catPro = CategoryProduct::create($input2);

            return redirect()->route('products')->withErrors([
                'message' => 'Nouveau produit cree',
                'label' => 'success'
            ]);
        } 
        return redirect()->back()->withErrors([
            'message' => 'Le fichier importe n\'est pas une image',
            'label' => 'warning'
        ]);
    }

    public function getImages(Request $request) {
        dd($request);
    }
}
