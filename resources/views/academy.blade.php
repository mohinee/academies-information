@extends('app')
@section('header')

<title>{!! $academy->getName() !!}</title>
<h1> Academy Details</h1>

<a href="/academy/create">Create Academy</a>                                  <a href="/explore">Explore</a>

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