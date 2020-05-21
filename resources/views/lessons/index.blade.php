@extends('layouts.app')

@section('content')
    <h1>Lessons</h1>
    @if(count($lessons) > 0)
        @foreach($lessons as $lesson)
            <div class="card p-3 mt-3 mb-3">
                <h3><a href="/lessons/{{$lesson->id}}">{{$lesson->title}}</a></h3>
                <small>Entered on {{$lesson->created_at}} by {{$lesson->user->name}}</small>
            </div>
        @endforeach
        {{$lessons->links()}}
    @else
            <p>No lessons found..</p>
    @endif
@endsection