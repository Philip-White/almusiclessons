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
                    @role('writer')
                            <a href="lessons/create" class="btn btn-primary">Create Lesson</a>
                            @endrole    
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
