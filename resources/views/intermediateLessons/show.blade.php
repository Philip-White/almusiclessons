@extends('layouts.app')

@section('content')
    <a href="/intermediatelessons" class="btn btn-primary">Go Back</a>
    <div class="card" style="width: auto;">
        <img src="/storage/cover_images/{{$intLessons->cover_image}}" class="card-img-top">
        <div class="card-body">
            
          <h5 class="card-title">{{$intLessons->title}}</h5>
          <div class="videoScreen">
            <iframe width="950" height="450" src="{{$intLessons->video1}}">
            </iframe>
          </div>
          <p>{!! $intLessons->body !!}</p>
            <hr>
            <small>Entered on {{$intLessons->created_at}} by {{$intLessons->user->name}}</small>
        </div>
    </div>
    @if(!Auth::guest())
    @if(Auth::user()->id == $intLessons->user_id)
    <a href="/intermediatelessons/{{$intLessons->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' => ['IntermediateLessonsController@destroy', $intLessons->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
    @endif
@endsection