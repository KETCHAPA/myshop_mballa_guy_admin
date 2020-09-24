<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function index() {
        $admins = User::where('isAdmin', '!=' , '0')->where('id',  '!=', Auth::user()->id)->get();
        return view('BackEnd.Admin.index', compact('admins'));
    }

    public function create() {
        return view('BackEnd.Admin.add');
    }

    public function store(Request $request) {
        if($request->password != $request->cpassword) {
            return redirect()->back()->withErrors([
                'message' => 'Les deux mots de passe doivent coincider',
                'label' => 'warning'
            ]);
        }

        $login = [];
        $all = User::where('isAdmin', '!=', '0')->get();
        foreach($all as $a) {
            array_push($login, $a->login);
        }

        $input = $request->all();

        if($request->file('photo')) {
            $image = $request->file('photo');
            $name = time() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path('assets\images\backend\admin'), $name);
            $input['photo'] = $name;
        }

        if(in_array($request->login, $login)) {
            return redirect()->back()->withErrors([
                'message' => 'Nom d\'utilisateur deja utilise. Renseigner un autre',
                'label' => 'warning'
            ]);
        }

        $admin = User::create($input);

        return redirect()->route('admins')->withErrors([
            'message' => 'Nouvel employe cree',
            'label' => 'success'
        ]);
    }

    public function destroy($email) {
        $user = User::where('email', $email)->first();
        $user->delete();

        return response()->json('Administrateur supprime');
    }
}