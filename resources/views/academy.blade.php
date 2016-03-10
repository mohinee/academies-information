@extends('app')
@section('header')

<title>{!! $academy->getName() !!}</title>
<center>
<h1> Academy Details</h1>

<a class="btn btn-default" href="/academy/create">Create Academy</a><td></td><a class="btn btn-default" href="/explore">Explore</a>
</center>
@stop

@section('content')

  <div class="form-group">
    <label for="name">Academy Name: </label>
    {!! $academy->getName() !!}
  </div>
  <div class="form-group">
    <img style="height:30%;width:75%;" src = {{ URL::to('/'.$academy->getImages()) }}  />
  </div>
  <div class="form-group">
    <label for="time_slots">Timeslots: </label>
    {!! $academy->getTimeSlots() !!}
  </div>
  <div class="form-group">
    <label for="phone">Phone: </label>
     {!! $academy->getPhone() !!}
  </div>
  <div class="form-group">
    <label for="description">Description: </label>
     {!! $academy->getDescription() !!}
  </div>
  

@stop