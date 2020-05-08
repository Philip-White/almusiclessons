@extends('layouts.app')

@section('content')
    <a href="/lessons" class="btn btn-default">Go Back</a>
    <h1>{{$lesson->title}}</h1>
    <div>
        {!! $lesson->body !!}
    </div>
    <hr>
    <small>Entered on {{$lesson->created_at}}</small>
    <hr>
    <a href="/lessons/{{$lesson->id}}/edit" class="btn btn-default">Edit Lesson</a>

    {!!Form::open(['action' => ['LessonsController@destroy', $lesson->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection