@extends('admin.admindashboard')

@section('content')
<div>
  <button class="btn btn-primary mb-2 addsales" data-toggle="modal" data-target="#Addsales">Add Permission</button>
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
            <a onclick="confirmation(event)" href="{{ route('delete.sale', $item->id) }}">
              <button class="btn btn-danger">Delete</button>
            </a>

            <a href="" class="btn btn-warning"> Edit</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
