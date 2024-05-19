@extends('admin.admindashboard')

@section('content')
<div>
  <button class="btn btn-primary mb-2 updatesales" data-toggle="modal" data-target="#addpermission">Add Permission</button>
</div>
<div class="panel panel-default">
  <div class="panel-heading">All Permissions</div>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr>
          <th>S/N</th>
          <th>Permission Name</th>
          <th>Group Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $totalAmount = 0;
        @endphp
        @foreach ($permissions as $index => $item)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->group_name }}</td>
          <td>
            <a onclick="confirmation(event)" href="{{ route('delete.permission', $item->id) }}">
              <button class="btn btn-danger">Delete</button>
            </a>

            <a href="#" class="btn btn-warning updatepermission" data-id="{{$item->id}}" data-toggle="modal" data-target="#addpermission"> Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="modal" id="addpermission" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Permission</h4>
        
      </div>
      
      <!-- Modal body -->
      <form action="{{route('add.permission')}}" method="POST">
          @csrf
      <div class="modal-body">
       <input type="hidden" id="permissionid" class="form-control" name="id">
       <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" class="form-control" id="permissionname" name="name" required>
      
        </div>
   
        <div class="form-group">
          <label for="exampleFormControlInput1">Group Name</label>
          <select class="form-control form-select" name="group_name" id="group_name">

          <option selected disabled> Select Group</option>

          <option value="dashboard"> Dashboard Menu</option>
          <option value="sales"> sales Menu</option>
          <option value="orders">  Orders Menu</option>
          <option value="inventory">  Inventory Menu</option>
          <option value="batch_records"> Batch Flock Records</option>
          <option value="hatchery_records"> Hatchery Records</option>
          <option value="vaccination_records"> Vaccination Records</option>
          <option value="farm_settings"> Farm settings</option>
        </select>
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


@endsection
