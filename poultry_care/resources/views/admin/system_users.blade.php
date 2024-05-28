@extends('admin.admindashboard')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div>
<button class="btn btn-sm btn-success mb-3"data-toggle="modal" data-target=".updateModal">Add System User</button>
</div>
<div class="panel panel-default">
<div class="panel-heading"> All System Users</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-light" style="">
<tr>
<th>S/N</th>
<th>Profile</th>
<th>Username</th>
<th>Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Role</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@php
$totalAmount = 0;
@endphp
@foreach ($systemusers as $index => $item)
<tr>
<td>{{ $index + 1 }}</td>
<td>
<img src="{{(!empty($item->photo))? url('uploads/'.$item->photo) : url('uploads/profile.jpg')}}" style="width: 60px;height:40px;border-radius:50%">
</td>
<td>{{ $item->username}}</td>
<td>{{ $item->name }}</td>
<td>{{ $item->email}}</td>
<td>{{ $item->phone}}</td>
<td>
  @foreach ($item->roles as $role)
  <span class="badge badge-pill bg-warning"> {{$role->name}}</span>
      
  @endforeach  


</td>


<td> <a href="#" class="btn btn-sm btn-primary updateorder" data-toggle="modal" data-target=".updateModal"  data-id ="{{$item->id}}">Update</a>
    <a  onclick = "confirmation(event)"href="{{route('delete.order',$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>

  
</td>

</tr>

@endforeach
{{-- <tr>
<td colspan="6"></td>
<td><strong>Total:</strong></td>
<td>{{ $totalAmount }}</td>
<td colspan="5"></td>
</tr> --}}
</tbody>
</table>


</div>


</div>


<div class="modal updateModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">System Users</h4>
          
        </div>
        
        <!-- Modal body -->
        <form action="{{route('add.admin')}}" method="POST">
            @csrf
        <div class="modal-body">
         <input type="hidden" id="userid" class="form-control" name="id">
         <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email Address</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlInput1">Role Name</label>
            <select class="form-control form-select" name="roles" id="roles">
              <option selected disabled>Select Role</option>
             @foreach($roles as $role)
             <option value="{{$role->id}}"> {{$role->name}}</option>
        
             @endforeach
        
            </select>
           
        
          </div>
      
           


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>



<script>
$(document).ready(function(){

$('.updateorder').click(function(){

 var id  = $(this).attr('data-id');

 $.ajax({

  url:"{{route('edit.users')}}",
  type:'get',
  data:{{id:id}}
  success:function(data){
    console.log(data);
  }


 })


})








})

</script>

@endsection