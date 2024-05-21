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


  <hr>
  @foreach ($permission_groups as $group)
      


  
  <div class="row">
<div class="col-3">

  <div class="form-check mb-2">

    <input type="checkbox" class="form-check-input">
    <label class="form-check-label">
   {{$group->group_name}}
    </label>
      </div>
</div>

<div class="col-9">

  @php
  $permissions = App\Models\User::getPermissions($group->group_name);
  @endphp

@foreach ($permissions as $item)
    
  <div class="form-check mb-2">

    <input type="checkbox" class="form-check-input">
    <label class="form-check-label">
     {{$item->name}}
    </label>
      </div>

      @endforeach

      <br>
</div>
  </div>


  @endforeach
</form>
  </div>
</div>



@endsection
