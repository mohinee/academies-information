<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Academy;

class HomeController extends Controller
{
	public function index(){
		
	}
    public function explore(){

    	$academies = Academy::all();

    	return view('explore',compact('academies'));
    }

}
