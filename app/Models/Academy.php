<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = ['name', 'user_name', 'email', 'images', 'time_slots', 'phone', 'description', 'latitude', 'longitude'];

    public function tag(){
    	return $this->belongsToMany('App\Models\Tag');
    }

    public function getLatitude(){
    	return $this->latitude;
    }

    public function getLongitude(){
    	return $this->longitude;
    }

    public function getName(){
    	return $this->name;
    }

    public function getId(){
    	return $this->id;
    }

  
    public function getPhone(){
    	return $this->phone;
    }

    public function getTimeSlots(){
    	return $this->time_slots;
    }

    public function getTagNames(){
    	return $this->tag->name;
    }

    public function getImages(){
    	return $this->images;
    }

    public function getDescription(){
    	return $this->description;
    }


     public static function findAcademy($id)
    {
        return self::find($id);
    }

     public function getIdFromCoordinates($lat,$lon)
    {
    	$acad = self::where('latitude', $lat)->where('longitude',$lat)->get('id');
        return $acad->getId();
    }



}
