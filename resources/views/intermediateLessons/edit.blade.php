@extends('layouts.app')

@section('content')
    <h1>Edit Intermediate Lesson</h1>
    {!! Form::open(['action' => ['IntermediateLessonsController@update', $intLesson->id], 'method' => 'POST' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $intLesson->title, ['class' => 'form-control', 'placeholder' => 'Title'])}} 
        </div>
        <div class="form-group">
            {{Form::label('video1', 'Video1')}}
            {{Form::text('video1', $intLesson->video1, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $intLesson->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection