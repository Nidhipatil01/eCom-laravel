<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        //return $user->password;
        if(!$user||!Hash::check($req->password, $user->password))
        {
            return "Username or password not matched";
        }
        else
        {
            return redirect('/');
        }
    }
}
