@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Contact Me</h5>
          </div>
         <div class="card-body">
           <form method="post" action="contact-us">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label> Name </label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                  </div>
                </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label> Email </label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div>
                </div>   
              
               <div class="col-md-12">
                  <div class="form-group">
                    <label> Subject </label>
                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                  </div>
                </div>
               <div class="col-md-12">
                 <div class="form-group">
                    <label> Message </label>
                    <textarea class="form-control textarea" placeholder="Message" name="message"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
               <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 </div>
 <br>
 <br>
 @endsection