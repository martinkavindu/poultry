@extends('admin.admindashboard')

@section('content')
<div>

  <button class="btn btn-primary btn-xs mb-2 addsales"data-toggle="modal" data-target="#Addsales"> Add</button>
</div>
<div class="panel panel-default">
<div class="panel-heading">All Sales list</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-light" style="">
<tr>
<th>S/N</th>

<th>Product Name</th>
<th>Unit Price(KES)</th>
<th>Quantity</th>
<th>Discount</th>
<th>Total Amount(KSH)</th>
<th>Note</th>
<th>Date Created</th>
<th>Action</th>

</tr>
</thead>
<tbody>
@php
$totalAmount = 0;
@endphp
@foreach ($sales as $index => $item)
<tr>
<td>{{ $index + 1 }}</td>
<td>{{ $item->product }}</td>
<td>{{ $item->unit_price}}</td>
<td>{{ $item->Quantity}}</td>
<td>{{ $item->discount}}</td>
<td>{{$item->total_price}}</td>
<td>{{$item->notes}}</td>
<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
<td> <a href="#" class="btn btn-sm btn-primary updatesales" data-toggle="modal" data-target="#updateModal"  data-id ="{{$item->id}}">Update</a>
    <a  onclick = "confirmation(event)"href="{{route('delete.order',$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>
</td>

</tr>
@php
$totalAmount += $item->total_price;
@endphp
@endforeach
<tr>
<td colspan="4"></td>
<td><strong>Total:</strong></td>
<td> <b>{{ $totalAmount }}</b></td>
<td colspan="6"></td>
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
          <h4 class="modal-title">Add sale</h4>
          
        </div>
        
        <!-- Modal body -->
        <form action="{{route('add.sales')}}" method="POST">
            @csrf
        <div class="modal-body">
         <input type="hidden" id="orderid" class="form-control" name="id">
         <div class="form-group">
            <label for="exampleFormControlInput1">Product</label>
           <select class="form-control" name="product" id="product"></select>
          </div>
          {{-- <div class="form-group">
            <label for="exampleFormControlInput1">Customer</label>
            <input type="text" class="form-control" id="customer_id" name="customer_id">
          </div> --}}
          <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="text" class="form-control qty" id="quantity" name="quantity" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Unit Price</label>
            <input type="text" class="form-control" id="unitprice" name="unit_price" readonly>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Discount(KES)</label>
            <input type="text" class="form-control" id="discount" name="discount" required>
          </div>
      
          <div class="form-group">
            <label for="exampleFormControlInput1">Total price(KES)</label>
            <input type="text" class="form-control cost" id="total_price" name="total_price" readonly>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Notes</label>
            <textarea class="form-control" id="" rows="3" name="notes"></textarea>
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





@endsection