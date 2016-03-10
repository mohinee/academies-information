@extends('app')
@section('header')

<title>Create New Academy</title>
<center>
<h1>Create New Academy</h1>
<a class="btn btn-default" href="/explore">Explore</a>
</center>

@stop

@section('content')

@if (count($errors) > 0)
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
<form action="/academy" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label for="user_name">User Name</label>
    <input type="text" class="form-control" id="user_name" placeholder="user name" name="user_name" >
  </div>
  <div class="form-group">
    <label for="name">Academy Name</label>
    <input type="text" class="form-control" id="name" placeholder="academy name" name="name">
  </div>
  <div class="form-group">
    <label for="time_slots">Timeslots</label>
    <input type="text" class="form-control" id="time_slots" placeholder="8:00am - 9:00am, 10:00am - 11:00am" name="time_slots">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="phone no." name="phone">
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control" id="tags" placeholder="tag1, tag2, tag3" name="tags">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" placeholder="description" name="description">
  </div>
  <div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="-85 to 85">
  </div>
  <div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="-180 to 180">
  </div>
  <div class="form-group">
    <label for="images">Image</label>
    <input type="file" id="images" name="images">
  </div>
  <input type="submit" class="btn btn-default" value="Submit"/>
</form>




@stop