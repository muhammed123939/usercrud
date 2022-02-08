@extends('backend.master')
  @section('title','Edit User')
  @section('content') 
    
    <div class="container">
         <div class="card">
           <div class="card-body">
            <h1>Update user</h1>
            <hr>
                <!-- Session that confirm updating user  -->
            @if(Session()->has('successupdate'))
              <div class="alert alert-success">
                  <i class="fas fa-check fa-2x"></i>
                  {{ Session()->pull('successupdate') }}
              </div>
            @endif
                <!-- validation message on editting form appear here -->
            <div id="error_message">
             </div>
               <!-- form of editting user  -->
            <form action="{{url('user/edit')}}" method="POST"
             enctype="multipart/form-data" autocomplete="off">
              @csrf
              <div class="form-group">
                <input type="hidden" name="user_id"  class="form-control" value="{{$user->id}}">
              </div>

              <div class="form-group">
                <input type="text" name="name" id="nameofuser" placeholder="User Name" class="form-control" value="{{$user->name}}"  >
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" placeholder="User Email" class="form-control" value="{{$user->email}}" >
              </div>
              <div class="form-group">
                <input type="text" name="title" id="title" placeholder="User Title" class="form-control" value="{{$user->title}}" >
              </div>
              <div class="form-group">
                <input type="number" name="phone" id="phone" placeholder="User Phone" class="form-control" value="{{$user->phonenumber}}" >
              </div>
              <div class="form-group">
                <select class="form-control" id="specs_id" name ="specs_id"  >
                  <option value="{{$user->specs_id}}" >{{$user->specialitytype->name}}</option>
                  <option value="" >Choose Specialist</option>
                  @foreach($specialities as $type)
                  <option value="{{$type->id}}" >{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
 
              <div class="form-group">
                <input type="file" name="photo" id="photo" class="form-control" >
              </div>
              
              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
              </div>
            </form>
           </div>
         </div>
      </div>

@endsection
<!-- form validation with jquery  -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script>
      $(function (){
            $('form').submit(function (e){
              if($('#nameofuser').val() != '' && $('#email').val() != '' && $('#title').val() != '' && $('#phone').val() != '' && $('#specs_id').val() != '' ){
                    return 
                }
               $('#error_message').html('Please complete all data');
                e.preventDefault();
                $('#error_message').css({'background-color' : "red" });
            });
        });
    </script>
 