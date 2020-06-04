@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @role('creator')
                    <!--Here and only here is where a user can be registered to use the app
                    Also, only Andrew can do this as he is the only user that is a creator-->
                    <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        <h3>Register a new user</h3>
                            <a href="lessons/create" class="btn btn-primary">Create Lesson</a>
                            <h3>Your Lessons</h3>
                                @if(count($lessons) > 0)
                                    <table class="table  table-striped">
                                        <tr>
                                            <th>Title</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{$lesson->title}}</td>
                                        <td><a href="/lessons/{{$lesson->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>

                                            {!!Form::open(['action' => ['LessonsController@destroy', $lesson->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
{!!Form::close()!!}

                                        </td>
                                    </tr>
                                    @endforeach
                                    </table>
                                    @else
                                    <p>You have no Lessons...</p>
                                @endif
                                <!--the else below here if for role checking...-->
                                @else
                                <!--the else above is for role checking...-->
                                <p>Welcome user {{Auth::user()->name}}!</p>
                                <br>
                                <a href="/lessons" class='btn btn-primary'>Go to Lessons</a>
                                @endrole

                                    @role('creator')

                                <a href="intermediatelessons/create" class="btn btn-primary">Create Intermediate Lesson</a>
                                <h3>Your Lessons</h3>
                                    @if(count($intLessons) > 0)
                                        <table class="table  table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        @foreach($intLessons as $intLesson)
                                        <tr>
                                            <td>{{$intLesson->title}}</td>
                                            <td><a href="/intermediatelessons/{{$intLesson->id}}/edit" class="btn btn-primary">Edit</a></td>
                                            <td>
    
                                                {!!Form::open(['action' => ['IntermediateLessonsController@destroy', $intLesson->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    
                                            </td>
                                        </tr>
                                        @endforeach
                                        </table>
                                        @else
                                        <p>You have no Lessons...</p>
                                    @endif
                                    <!--the else below here if for role checking...-->
                                    @else
                                    <!--the else above is for role checking...-->
                                    <br>
                                    <br>
                                    <a href="/intermediatelessons" class='btn btn-primary'>Go to Intermediate Lessons</a>
                                        @endrole


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
