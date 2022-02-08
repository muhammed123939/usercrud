  @extends('backend.master')
  @section('title','Create New user')
  @section('content') 
    
    <div class="container">
         <div class="card">
           <div class="card-body">
            <h1>Create New user</h1>
            <hr>
            <!-- Session that confirm Creatting user  -->
            @if(Session()->has('success'))
              <div class="alert alert-success">
                  <i class="fas fa-check fa-2x"></i>
                  {{ Session()->pull('success') }}
              </div>
            @endif
            <!-- validation message on create form appear here -->
            <div id="error_message">
             </div>
             <!-- form of creatting user  -->
            <form action="{{url('user/create')}}" method="POST"
             enctype="multipart/form-data" autocomplete="off">
              @csrf
              
              <div class="form-group">
                <input type="text" name="name" id="nameofuser" placeholder="User Name" class="form-control" >
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" placeholder="User Email" class="form-control" >
              </div>
              <div class="form-group">
                <input type="text" name="title" id="title" placeholder="User Title" class="form-control" >
              </div>
              <div class="form-group">
                <input type="number" name="phone" id="phone" placeholder="User Phone" class="form-control" >
              </div>
              <div class="form-group">
                <select class="form-control" id="specs_id" name ="specs_id">
                  <option value="" >Choose Specialist</option>
                  @foreach($specialitytype as $type)
                  <option value="{{$type->id}}" >{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
 
              <div class="form-group">
                <input type="file" name="photo" id="photo" class="form-control" >
              </div>
              
              <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary">
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
              if($('#nameofuser').val() != '' && $('#email').val() != '' && $('#title').val() != '' && $('#phone').val() != '' && $('#specs_id').val() != '' && $('#photo').val() != '' ){
                    return 
                }
               $('#error_message').html('Please complete all data');
                e.preventDefault();
                $('#error_message').css({'background-color' : "red" });
            });
        });
    </script>
 