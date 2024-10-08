@extends('admin.admindashboard')

@section('content')
<div>
  <button class="btn btn-primary mb-2 updatesales" data-toggle="modal" data-target="#addrole">Create Role</button>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Role Center</div>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr>
          <th>S/N</th>
          <th>Role Name</th>
         
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
        $totalAmount = 0;
        @endphp
        @foreach ($roles as $index => $item)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $item->name }}</td>
          <td>
            <a onclick="confirmation(event)" href="{{ route('delete.role', $item->id) }}">
              <button class="btn btn-danger">Delete</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


<div class="modal" id="addrole" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create role</h4>
        
      </div>
      
      <!-- Modal body -->
      <form action="{{route('add.role')}}" method="POST">
          @csrf
      <div class="modal-body">
       <input type="hidden" id="roleid" class="form-control" name="id">
       <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" class="form-control" id="permissionname" name="name" required>
      
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
