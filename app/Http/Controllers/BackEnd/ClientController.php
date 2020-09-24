<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
    public function index() {
        $clients = User::where('isAdmin', 0)->get();
        return view('BackEnd.Client.index', compact('clients'));
    }

    public function block($email) {
        $user = User::where('email', $email)->first();
        $user->isBlock = 1;
        $user->save();

        return response()->json('Client bloque');
    }
} 
