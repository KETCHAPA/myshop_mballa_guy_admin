<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Cart;
use Carbon\Carbon;
use App\User;
use App\Message;
use App\PaymentMode;

/**
 * 
 * 0 => En attente
 * 1 => Paye pas encore livre
 * 2 => Paye et livre
 * 
*/

class HomeController extends Controller
{
    public function index() {
        return view('BackEnd.Auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('login', 'password');

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->withErrors([
                'message' => 'Login ou mot de passe incorrect',
                'label' => 'danger'
            ]);
        }

        if(Auth::user()->isAdmin == 0) {
            return redirect()->back()->withErrors([
                'message' => 'Login ou mot de passe incorrect',
                'label' => 'danger'
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function dashboard() {

        /**
         * 
         * Stats des ventes
         * 
         * **/

        //Ventes du mois en cours
        $sales = Order::where('paymentDate', Carbon::now()->subMonth())->where('status', '2')->get();
        $monthlySalesAmount = 0;
        foreach($sales as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $monthlySalesAmount += $cart->price;

        }

        //Variation des ventes sur les deux derniers mois
        $sales1 = Order::where('paymentDate', Carbon::now()->subMonth(2))->where('status', '2')->get();
        $monthly2SalesAmount = 0;
        foreach($sales as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $monthly2SalesAmount += $cart->price;

        }
        if($monthlySalesAmount > 0) {
            $variationSalesAmount = ($monthlySalesAmount - $monthly2SalesAmount) / $monthlySalesAmount;
        } else {
            if($monthly2SalesAmount > 0) {
                $variationSalesAmount = 1;
            } else {
                $variationSalesAmount = 0;
            }
        }

        //Ventes globales
        $sales = Order::where('status', '2')->get();
        $globalSalesAmount = 0;
        foreach($sales as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $globalSalesAmount += $cart->price;

        }

        //Paiement par Cash global
        $sales = Order::where('Pay_id', '2')->where('status', '2')->get();
        $cashSalesAmount = 0;
        foreach($sales as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $cashSalesAmount += $cart->price;
        }

        //Variation du paiement par Cash des deux derniers mois
        $variationCashSalesAmount = 0;
        $sales1 = Order::where('Pay_id', '2')->where('paymentDate', '>', Carbon::now()->subMonth())->where('status', '2')->get();
        $sales2 = Order::where('Pay_id', '2')->where('paymentDate', '>', Carbon::now()->subMonth(2))->where('paymentDate', '<=', Carbon::now()->subMonth())->where('status', '2')->get();
        $salesAmount1 = 0;
        foreach($sales1 as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $salesAmount1 += $cart->price;
        }
        $salesAmount2 = 0;
        foreach($sales2 as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $salesAmount2 += $cart->price;
        }
        if($salesAmount1 > 0) {
            $variationCashSalesAmount = ($salesAmount1 - $salesAmount2) / $salesAmount1;
        } else {
            if($salesAmount2 > 0) {
                $variationCashSalesAmount = 1;
            } else {
                $variationCashSalesAmount = 0;
            }
        }


        //Variation des ventes par OM des deux derniers mois
        $variationOMSalesAmount = 0;
        $sales1 = Order::where('Pay_id', '1')->where('paymentDate', '>', Carbon::now()->subMonth())->where('status', '2')->get();
        $sales2 = Order::where('Pay_id', '1')->where('paymentDate', '>', Carbon::now()->subMonth(2))->where('paymentDate', '<=', Carbon::now()->subMonth())->where('status', '2')->get();
        $salesAmount1 = 0;
        foreach($sales1 as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $salesAmount1 += $cart->price;
        }
        $salesAmount2 = 0;
        foreach($sales2 as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $salesAmount2 += $cart->price;
        }
        if($salesAmount1 > 0) {
            $variationOMSalesAmount = ($salesAmount1 - $salesAmount2) / $salesAmount1;
        } else {
            if($salesAmount2 > 0) {
                $variationOMSalesAmount = 1;
            } else {
                $variationOMSalesAmount = 0;
            }
        }
        
        //Paiement par Orange money global
        $sales = Order::where('Pay_id', '1')->where('status', '2')->get();
        $OMSalesAmount = 0;
        foreach($sales as $sale) {
            $cart = Cart::findOrFail($sale->Car_id);
            $OMSalesAmount += $cart->price;
        }

        //Nombre de clients total
        $numClients = User::where('isAdmin', '0')->count();

        //Interaction global des messages entre client et l'admin
        $interactions = Message::all()->count();
        
        //Interaction du mois des messages entre client et l'admin
        $monthlyInteractions = Message::where('date', '>', Carbon::now()->subMonth())->count();
        
        //Interaction de 2mois plutot des messages entre client et l'admin
        $monthly2Interactions = Message::where('date', '>', Carbon::now()->subMonth(2))->where('date', '<', Carbon::now()->subMonth())->count();
        if($monthlyInteractions > 0) {
            $variationInteractions = ($monthlyInteractions - $monthly2Interactions) / $monthlyInteractions;
        } else {
            if($monthly2Interactions > 0) {
                $variationInteractions = 1;
            } else {
                $variationInteractions = 0;
            }
        }

        //5 Dernieres commandes
        $firstLastOrders = Order::orderBy('paymentDate', 'DESC')->take(5)->get();
        foreach($firstLastOrders as $order) {
            $cart = Cart::find($order->Car_id);
            $payment = PaymentMode::find($order->Pay_id);
            $order->amount = $cart->amount;
            $order->paymentMode = $payment->name;
        }

        //3 Employes
        $firstLastUsers = User::where('isAdmin', '!=', '0')->where('id', '!=', Auth::user()->id)->take(5)->get();

        //Notifications
        $notifications = [];

        return view('BackEnd.Home', compact('monthlySalesAmount', 'notifications', 'firstLastUsers', 'variationCashSalesAmount', 'variationSalesAmount', 'variationInteractions', 'variationOMSalesAmount', 'OMSalesAmount', 'cashSalesAmount', 'globalSalesAmount', 'numClients', 'interactions', 'firstLastOrders', 'monthlyInteractions'));
    }

    public function logout() {
        Auth::logout();
        return view('BackEnd.Auth.login')->withErrors([
            'message' => 'Deconnexion reussie',
            'label' => 'success'
        ]);
    }
}
