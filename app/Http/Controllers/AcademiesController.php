<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Academy;
use App\Models\Tag;
use Validator;

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

		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["images"]["name"]);
		/*$uploadOk = 1;*/
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		/*// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["images"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["images"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["images"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}*/
		
 	// 	$request->file('images')->move($request->input('images'),"/images/");
 		
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
