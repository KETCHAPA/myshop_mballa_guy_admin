<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index() {
        return view('BackEnd.User.account');
    }

    public function store(Request $request) {
        $user = User::find(Auth::user()->id);
        if($request->password) {
            if($request->password != $request->cpassword) {
                return redirect()->back()->withErrors([
                    'message' => 'Les mots de passe ne coincident pas',
                    'label' => 'warning'
                ]);
            }

            $user->password = $request->password;
        }
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path('assets\images\backend\admin'), $name);
            
            $input = $request->all();
            $user->photo = $name;
        }
        if($request->firstname) {
            $user->firstname = $request->firstname;
        }
        if($request->lastname) {
            $user->lastname = $request->lastname;
        }
        if($request->login) {
            $users = User::all();
            $logins = [];
            foreach($users as $user) {
                array_push($logins, $user->login);
            }
            if(in_array($request->login, $logins)) {
                return redirect()->back()->withErrors([
                    'message' => 'Nom d\'utilisateur deja utilise. Renseignez un autre',
                    'label' => 'warning'
                ]);
            }
            $user->login = $request->login;
        }
        if($request->email) {
            $users = User::all();
            $emails = [];
            foreach($users as $user) {
                array_push($emails, $user->email);
            }
            if(in_array($request->email, $emails)) {
                return redirect()->back()->withErrors([
                    'message' => 'Email deja utilise. Renseignez un autre',
                    'label' => 'warning'
                ]);
            }
            $user->email = $request->email;
        }
        if($request->street) {
            $user->street = $request->street;
        }

        $user->save();
        return redirect()->route('account')->withErrors([
            'message' => 'Informations mise a jour',
            'label' => 'success'
        ]);
    }
}
