<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use App\PaymentMode;
use App\Product;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        foreach($orders as $order) {
            //Add paymentMode
            $order->paymentMode = PaymentMode::findOrFail($order->Pay_id)->name;
            
            //Add cart
            $cart = Cart::findOrFail($order->Car_id);
            $order->cart = $cart;

            //Add Quantities
            $qties = explode(',', $cart->qties);
            array_pop($qties);
            $order->qties = $qties;

            //Add photos and names of products
            $products = explode(',', $cart->products);
            array_pop($products);
            $photos = [];
            $names = [];
            foreach ($products as $id) {
                $product = Product::find($id);
                array_push($photos, $product->photo);
                array_push($names, $product->name);
            }
            $order->photos = $photos;
            $order->names = $names;
        }
        return view('BackEnd.Orders.order', compact('orders'));
    }
}
