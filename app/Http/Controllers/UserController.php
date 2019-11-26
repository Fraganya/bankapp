<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function apiLogin(Request $request)
    {
        $credentials = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];
    
        if(Auth::attempt($credentials)){
            return ['status'=>true,'user'=>User::where('email',$credentials['email'])->first()]; 
        }

        return ['status'=>false]; 
    }

    public function apiBalance(User $user){
        return ['balance'=>"$user->balance"];
    }

    public function apiDeposits(User $user){
        return $user->deposits;
    }


    public function getAll(){
        return Fund::all(['name','value']);

    }

}

/*
php artisan make:migration create_funds_table 
===============================================
Fileds:
name - string
value - double 
==============================================

php artisan make:model Fund --resource

php artisan tinker 

===========================================
$fund = new \App\Fund;
$fund->name ='OMM';
$fund->value = 0.4
$fund->save();
*/