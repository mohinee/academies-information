<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
	public function index(){
		return redirect('/explore');
	}
    public function explore(){
    	return view('explore');
    }

}
