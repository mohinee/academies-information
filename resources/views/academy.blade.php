@extends('app')
@section('header')

<title>{!! $academy->getName() !!}</title>

@stop

@section('content')

  <div class="form-group">
    <label for="name">Academy Name: </label>
    {!! $academy->getName() !!}
  </div>
  <div class="form-group">
    <img style="height:200px;width:200px;" src = {!! $academy->getImages() !!}  />
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