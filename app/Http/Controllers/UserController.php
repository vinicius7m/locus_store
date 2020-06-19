<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $user = auth()->user();    
    //     view()->share('user', $user);
    // }
    

    public function index($user) {
        $user = \App\User::find($user);

        return view('view-user', compact('user'));
    }

    public function edit($user)
    {
        $user = \App\User::find($user);

        return view('edit-user', compact('user'));
    }

    public function update(Request $request, $user)
    {
        

        if($request->password == $request->confPassword) {
            bcrypt($request->password);
            
            $user = \App\User::find($user);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            flash('Perfil atualizado com sucesso')->success();
            return view('view-user', compact('user'));
        } else {
            flash('Senhas diferentes, tente novamente')->success();
            return view('view-user', compact('user'));
            
        }

        

    }
}
