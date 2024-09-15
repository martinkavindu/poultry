@extends('admin.admindashboard')

@section('content')
<div>

  <button class="btn btn-primary btn-xs mb-2"data-toggle="modal" data-target="#Addsales"> Create Inventory</button>
</div>
<div class="panel panel-default">
<div class="panel-heading">Inventories</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-light" style="">
<tr>
<th>S/N</th>
<th>Proudct ID</th>
<th>Product Name</th>
<th>Product Price(KES)</th>
<th>Quantity</th>
<th>Unit</th>
<th>Category</th>
<th>Total value(KES)</th>
<th>Created</th>
<th>Action</th>

</tr>
</thead>
<tbody>
@php
$totalAmount = 0;
@endphp
@foreach ($inventories as $index => $item)
<tr>
<td>{{ $index + 1 }}</td>
<td>{{ $item->product_id }}</td>

<td>{{ $item->product_name }}</td>

<td>{{ $item->product_price}} KES</td>
<td>{{ $item->Quantity }}</td>
<td>{{$item->unit}}</td>
<td>{{$item->category}}</td>
<td> {{$item->product_price * $item->Quantity}} KES</td>
<td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d/m/Y') }}</td>
<td> <a href="#" class="btn btn-sm btn-primary updateinventory" data-toggle="modal" data-target="#Updateinventory"  data_id ="{{$item->id}}">Update</a>
    <a  onclick = "confirmation(event)"href="{{route('delete.product',$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>
</td>

</tr>
@php
$totalAmount += $item->product_price * $item->Quantity;
@endphp
@endforeach

<tr>
    <td colspan="6"></td>
    <td class="fs-6"><strong>Total:</strong></td>
    <td class="fs-5" style="font-weight: 800">{{ $totalAmount }} KES</td>
    <td colspan="5"></td>
    </tr>
</tbody>
</table>


</div>


</div>


<div class="modal" id="Addsales">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Inventory</h4>
          
        </div>
        
        <!-- Modal body -->
        <form action="{{route('add.inventory')}}" method="POST">
            @csrf
        <div class="modal-body">
         <input type="hidden" id="orderid" class="form-control" name="id">
         <div class="form-group">
            <label for="exampleFormControlInput1">Product</label>
            <input type="text" class="form-control" id="product_name" name="product_name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Price</label>
            <input type="text" class="form-control" id="product_price" name="product_price">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
          </div>

          
          <div class="form-group">
            <label for="exampleFormControlInput1">Unit type</label>
            <select name="unit" class="form-control">
                <option selected disabled>
              Select unit
                </option>
                <option value="single_unit">Single unit</option>
                <option value="dozen">Dozen</option>
                <option value="tray">Tray</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Category</label>
            <select name="category" class="form-control">
                <option selected disabled>
              Select Category
                </option>
                <option value="kienyeji">Kienjeji</option>
                <option value="grade">grade</option>
                <option value="broiler">Broiler</option>
                <option value="layer">Layer</option>
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


{{-- update inventory --}}

<div class="modal" id="Updateinventory">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Inventory</h4>
        
      </div>
      
      <!-- Modal body -->
      <form action="{{route('update.inventory')}}" method="POST">
          @csrf
      <div class="modal-body">
       <input type="text" id="inventoryid" class="form-control" name="id">
       <div class="form-group">
          <label for="exampleFormControlInput1">Product</label>
          <input type="text" class="form-control product_nam" id="" name="product_name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Product Price</label>
          <input type="text" class="form-control product_price" id="" name="product_price">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Quantity</label>
          <input type="text" class="form-control quantity" id="" name="quantity">
        </div>

        
        <div class="form-group">
          <label for="exampleFormControlInput1">Unit type</label>
          <select name="unit" class="form-control unit_type">
              <option selected disabled>
            Select unit
              </option>
              <option value="single_unit">Single unit</option>
              <option value="dozen">Dozen</option>
              <option value="tray">Tray</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Category</label>
          <select name="category" class="form-control">
              <option selected disabled>
            Select Category
              </option>
              <option value="kienyeji">Kienjeji</option>
              <option value="grade">grade</option>
              <option value="broiler">Broiler</option>
              <option value="layer">Layer</option>
          </select>
        </div>

      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>




@endsection