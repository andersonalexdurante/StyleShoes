<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function authenticate(Request $req){
        $data = $req->input();
        $user = User::where('email', '=', $data['email'])
            ->where('password', '=', $data['password'])->first();
        if($user === null) {
           return redirect('/');
        }
        else {
            $req->session()->put('user', $user->name);
            return redirect('products');
        }

    }
}
