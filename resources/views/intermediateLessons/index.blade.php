@extends('layouts.app')

@section('content')
    <h1>Intermediate Lessons</h1>
    @if(count($intLessons) > 0)
        @foreach($intLessons as $intLesson)
            <div class="card p-3 mt-3 mb-3">
                <div class="row">
                    <div class='col-md-4 col-sm-4'>
                        <img style="width: 100%" src="/storage/cover_images/{{$intLesson->cover_image}}" class="cardSize">
                    </div>
                    <div class='col-md-8 col-sm-8'>
                <h3><a href="/intermediatelessons/{{$intLesson->id}}">{{$intLesson->title}}</a></h3>
                <small>Entered on {{$intLesson->created_at}} by {{$intLesson->user->name}}</small>
                    </div>
            </div>
        @endforeach
        {{$intLessons->links()}}
    @else
        <p>No lessons found...</p>
    @endif
@endsection