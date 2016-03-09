<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Academy;
use App\Models\Tag;
use Validator;
use Storage;

class AcademiesController extends Controller
{
 	
 	public function create(){
 		return view('create');
 	}  

 	public function store(Request $request){
 	 	

 	 	$validate = Validator::make($request->all(), [
 	 		'name'=>'required',
 	 		'user_name'=>'required|unique:academies', 
 	 		'email'=>'required|unique:academies|email',
 	 		//'images'=>'required|image',
 	 		'time_slots'=>'required',
 	 		'phone'=>'required|numeric',
 	 		'description'=>'required',
 	 		'latitude'=>'required|numeric',
 	 		'longitude'=>'required|numeric',
 	 		'tags' => 'required'
 	 		]);

 	 	if ($validate->fails()){
 	 		return redirect ('/academy/create')->withErrors($validate->errors()->all())->withInput();
 	 	}

		$image = $request->file('images');
 	 	
 	 	
		Storage::disk('local')->put('images/'.$image->getClientOriginalName(),file_get_contents($image->getRealPath())); 	
		
 		$academy = Academy::create($request->all());


 		$tags = explode(',', $request->input('tags'));
 		$tagObjs = [];
 		foreach($tags as $tag){
 			$tagObjs[] = Tag::firstOrCreate(['name'=>$tag]);
 			
 		}

 		foreach ($tagObjs as $key => $tagObj) {
 			$academy->tag()->attach($tagObj->id);
 		}

 		return redirect('/');
 	}


 	

 	public function show(Request $request){

 		 return redirect('academy/showdetails/'.$request->input('id'));
 	}

	public function index($id){

		 $academy = Academy::findAcademy($id);

 		 return view('academy',compact('academy'));
 	}

}
