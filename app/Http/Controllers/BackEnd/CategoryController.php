<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryProduct;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('BackEnd.Products.category', compact('categories'));
    }

    public function store(Request $request) {
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path('assets\images\backend\categories'), $name);
            $input['photo'] = $name;
            $input['name'] = $request->name;
            $category = Category::create($input);
            if(!$category) {
                return redirect()->back()->withErrors([
                    'message' => 'Impossible d\'ajouter une categorie pour l\'instant',
                    'label' => 'danger'
                ]);
            }
            return redirect()->back()->withErrors([
                'message' => 'Nouvelle categorie creee',
                'label' => 'success'
            ]);
        } 
        return redirect()->back()->withErrors([
            'message' => 'Le fichier importe n\'est pas une image',
            'label' => 'warning'
        ]);
    }
}
