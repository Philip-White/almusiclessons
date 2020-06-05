@extends('layouts.app')

@section('content')
        <br>
        <br>
        <br>
        <div class='intro'>
                <h1 class='animate__animated animate__slideInLeft'>almusiclessons</h1>
                        <div class='thePill' id='thePill'>
                                <p style='display: inline; color: white; border-style: solid;' id='getStarted'><a style="color: white;" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                                <p style='display: inline;'><i class="fa fa-music"></i></p>
                                <p style='display: inline; color: white; border-style: solid;' id='getStarted1'><a style="color: white;" href="/about">Get Started</a></p>
                        </div>
        </div>
@endsection
