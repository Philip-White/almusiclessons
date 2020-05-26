@extends('layouts.app')

@section('content')
    <a href="/lessons" class="btn btn-default">Go Back</a>
    <div class="card" style="width: auto;">
        <img src="/storage/cover_images/{{$lesson->cover_image}}" class="card-img-top">
        <div class="card-body">
            
          <h5 class="card-title">{{$lesson->title}}</h5>
          <div class="videoScreen">
            <iframe width="950" height="450" src="{{$lesson->video1}}">
            </iframe>
          </div>
          <p>{!! $lesson->body !!}</p>
            <hr>
            <small>Entered on {{$lesson->created_at}} by {{$lesson->user->name}}</small>
        </div>
    </div>
    <hr>
    @if(!Auth::guest())
    @if(Auth::user()->id == $lesson->user_id)
    <a href="/lessons/{{$lesson->id}}/edit" class="btn btn-default">Edit Lesson</a>

    {!!Form::open(['action' => ['LessonsController@destroy', $lesson->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif

@endsection