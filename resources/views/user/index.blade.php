@extends('backend.master')
@section('title','Show user')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <a href="{{url('user/showcreate')}}" class="btn btn-primary">Create user</a>
      <a href="{{url('user/vue')}}" class="btn btn-primary">user vue</a>
      <h1>Show Users</h1>
      <hr>
      <!-- Session that confirm deleting user  -->
            @if(Session()->has('success2'))
              <div class="alert alert-success">
                  <i class="fas fa-check fa-2x"></i>
                  {{ Session()->pull('success2') }}
              </div>
            @endif
      <!-- table to view users data  -->
      <table id="users" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>title</th>
          <th>speciality</th>
          <th>phone</th>
          <th>Photo</th>
          <th class="text-center">Operations</th>
        </tr>
        </thead>
        <tbody>
          <?php 
              $s = 1;
          ?>
          <!-- loop to get users in DB -->
          @foreach($users as $user)
          <tr>
              <td>{{ $s++ }}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->title}}</td>
              <td>{{$user->specialitytype->name}}</td>
              <td>{{$user->phonenumber}}</td>
              <td class="text-center">
                @if($user->image != NULL)
                  <img src="/uploaded/user/{{$user->image}}" width="80" height="80">
                </a>
                @else 
                   {{ 'No Photo..' }}
                @endif
              </td>
              <td class="text-center">
                <a href="{{url('user/edit',$user->id)}}"><i class="fas fa-edit"></i></a>
                <a href="#deleteuser{{$user->id}}" data-toggle="modal"><i class="fas fa-trash" style="color:red"></i></a>
                <a href="#myuser{{$user->id}}" data-toggle="modal" class="btn btn-primary">View user</a>
              </td>

              <!-- modal to view name and title of choosen user  -->
              {{-- start model --}}
              <div class="modal fade" tabindex="-1" id="myuser{{$user->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">View user</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <p> User name is {{$user->name}} and his title is {{$user->title}} </p>
                  </div>
                </div>
              </div>
              {{-- end model --}}  

              <!-- modal to delete user -->
              {{-- start model --}}
              <div class="modal fade" tabindex="-1" id="deleteuser{{$user->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete user</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{url('user/delete')}}" method="post" >
                      @csrf
                    <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                      <p>Are you sure to delete {{$user->name}}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              {{-- end model --}} 
              
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
 </div>
@endsection