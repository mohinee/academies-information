@extends('app')
@section('header')

<title>create</title>

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
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="abc@gef.com">
  </div>
  <div class="form-group">
    <label for="user_name">User Name</label>
    <input type="text" class="form-control" id="user_name" placeholder="user name" name="user_name" value="fsdj">
  </div>
  <div class="form-group">
    <label for="name">Academy Name</label>
    <input type="text" class="form-control" id="name" placeholder="academy name" name="name" value="kops">
  </div>
  <div class="form-group">
    <label for="time_slots">Timeslots</label>
    <input type="text" class="form-control" id="time_slots" placeholder="8:00am - 9:00am, 10:00am - 11:00am" name="time_slots" value="82391">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="phone no." name="phone" value="789456132">
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" class="form-control" id="tags" placeholder="tag1, tag2, tag3" name="tags" value="kjds,gds,hdkj">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" placeholder="description" name="description" value="kljsdklas">
  </div>
  <div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text" class="form-control" id="latitude" name="latitude" value="123.23">
  </div>
  <div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" id="longitude" name="longitude" value="456.02">
  </div>
  <div class="form-group">
    <label for="images">Image</label>
    <input type="file" id="images" name="images">
  </div>
  <input type="submit" class="btn btn-default" value="Submit"/>
</form>




@stop