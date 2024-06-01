@extends('admin.admindashboard')

@section('content')
<div class="card" style="width: 600px !important">
    <div class="card-header">Import Permissions</div>
    <div class="card-body">
        <form action="" type = "">
            @crsf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload XLSX</label>
            <input class="form-control" type="file" id="formFile" name="importfile">
          </div>

          <button class="btn btn-success" type="submit"> Upload</button>

        </form>

    </div>

  </div>




@endsection
