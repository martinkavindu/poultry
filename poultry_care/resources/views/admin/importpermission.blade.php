@extends('admin.admindashboard')

@section('content')
<a href="{{route('export')}}" class="btn btn-primary mb-3">Download Excel Template</a>
<div class="card" style="width: 600px !important">
    
    <div class="card-header">
    <h1>Import Permissions</h1>
    
    </div>
    <div class="card-body">
        <form action="{{route('import.permission')}}" type = "POST" enctype="multipart/form-data">
          @csrf
         
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload XLSX</label>
            <input class="form-control" type="file" id="formFile" name="importfile">
          </div>

          <button class="btn btn-success" type="submit"> Upload</button>

        </form>

    </div>

  </div>




@endsection
