
@extends('layouts.app')

@section('content')
    <h1>Edit Lesson</h1>
        {!! Form::open(['action'=> ['LessonsController@update', $lesson->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class='form-group'>
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $lesson->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('video1', 'Video1')}}
                {{Form::text('video1', $lesson->video1, ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class='form-group'>
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $lesson->body, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <small>(You must enter the picture file each time you edit your lesson)</small>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection()