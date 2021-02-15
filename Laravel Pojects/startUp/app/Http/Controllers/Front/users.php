<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class users extends Controller
{
    //
        public function __construct   (){
            $this->middleware('auth')->except('show');

        } 
    public function showAdminName(){
        return "Alaa Hameed 1";
    }
    public function show(){
        return "Alaa Hameed 2";
    }
}
