<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function deposit(Request $request){
        $user = Auth::user(); // get the currently logged in user
        $user->balance = $user->balance + $request->input('amount'); // increment balance
        $user->save();
        return back();

    }
}
