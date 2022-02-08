@extends('backend.master')
@section('title','Show User VUE')
@section('content')
 <div class="container" id="crudapp">
  <div class="card">
    <div class="card-body">
      <a href="{{url('user/showcreate')}}" class="btn btn-primary">Create user</a>
      <a href="{{url('user/vue')}}" class="btn btn-primary">user vue</a>
      <h1>Show Users VUE</h1>
      <hr>
       <!-- table to view users data  -->
      <table id="users" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>email</th>
          <th>title</th>
          <th>phone</th>
        </tr>
        </thead>
        <tbody>
              <tr v-for="(row,index,key) in userdata" :key="row.id">
              <td>@{{row.name}}</td>
              <td>@{{row.email}}</td>
              <td>@{{row.title}}</td>
              <td>@{{row.phonenumber}}</td>
           </tr>
        </tbody>
      </table>
    </div>
  </div>
 </div>

@endsection
 <!-- getting users data via VUE.js  -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js" ></script>
<script src="https://unpkg.com/axios/dist/axios.min.js" ></script>
 <script>
window.onload = function (){
  var v = new Vue ({
    el:'#crudapp',
    data:{
      userdata:{},
    },
    methods:{
      getData:function(){
        axios.get('getdata').then((res)=>{
        this.userdata=res.data;
        }).catch((error)=>{

        })
      } 
    },
    mounted(){
      this.getData();
    }
  })
}

</script>
