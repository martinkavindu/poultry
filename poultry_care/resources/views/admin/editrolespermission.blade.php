@extends('admin.admindashboard')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style type="text/css">
  .form-check-label {
    text-transform: capitalize !important;
  }
  </style>
  

<div class="card" style="width: 700px;align-content:center">
  <div class="card-header">
 Add Role&Permission
  </div>
  <div class="card-body">
<form action="{{route('store.permission.role')}}" method = "POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Role Name</label>
<h3>{{$role->name}}</h3>

    </select>
   

  </div>

  <div class="form-check mb-2">

<input type="checkbox" class="form-check-input" id="checkdefaultmain">
<label class="form-check-label" >
  Permission All
</label>
  </div>


  <hr>
  @foreach ($permission_groups as $group)
      


  
  <div class="row">
<div class="col-3">
    @php
    $permissions = App\Models\User::getPermissions($group->group_name);
    @endphp

  <div class="form-check mb-2">

    <input type="checkbox" class="form-check-input"{{
        App\Models\User::roleHasPermissions($role,$permissions) ? "checked" : ""
    }}>
    <label class="form-check-label">
   {{$group->group_name}}
    </label>
      </div>
</div>

<div class="col-9">

@foreach ($permissions as $permission)
    
  <div class="form-check mb-2">

    <input type="checkbox" class="form-check-input" name="permission[]" id="{{$permission->id}}" value="{{$permission->id}}"
  {{$role->hasPermissionTo($$permission->name) ? "checked" : ""}}>
    <label class="form-check-label">
     {{$permission->name}}
    </label>
      </div>

      @endforeach

      <br>
</div>
  </div>


  @endforeach

  <button type="submit" class="btn btn-success">Save </button>
</form>
  </div>
</div>

<script type="text/javascript">
$('#checkdefaultmain').click(function(){

  if($(this).is(':checked')){

    $('input[type = checkbox]').prop('checked',true); 
  } else{

    
    $('input[type = checkbox]').prop('checked',false)

  }
})

  </script>


@endsection
