@extends('admin.admindashboard')

@section('content')

<div class="card" style="width: 700px;align-content:center">
  <div class="card-header">
 Add Role&Permission
  </div>
  <div class="card-body">
<form action="" method = "POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Role Name</label>
    <select class="form-control form-select">
      <option selected disabled>Select Role</option>
     @foreach($roles as $role)
     <option value="{{$role->id}}"> {{$role->name}}</option>

     @endforeach

    </select>
   

  </div>

  <div class="form-check mb-2">

<input type="checkbox" class="form-check-input">
<label class="form-check-label">
  Permission All
</label>
  </div>
</form>
  </div>
</div>



@endsection
