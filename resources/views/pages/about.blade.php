@extends('layouts.app')

@section('content')

<div class="card p-3 mt-3 mb-3">
    <div class="row">
        <div class='col-md-4 col-sm-4'>
            <img style="width: 100%" src="/img/me.jpg" class="cardSize">
        </div>
            <div class='col-md-8 col-sm-8'>
                <h3>Offering music lessons for many instruments and theory</h3>
                <h3>Contact me <a href="/contact-us">here</a> to get started on lessons!  Leave a message about what your
                goals are, what instument you play and when you would like to start-</h3>
                <p class="instrumentStyle"><i class='fas fa-drum drumStyle'></i><i class="fa fa-music drumStyle" aria-hidden="true"></i><i class="fas fa-guitar drumStyle"></i></p>


            </div>    
    </div>
</div>
@endsection
