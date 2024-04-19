@extends('admin.admindashboard')

@section('content')
<div>

  <button class="btn btn-primary btn-xs mb-2"data-toggle="modal" data-target="#Addsales"> Add</button>
</div>
<div class="panel panel-default">
<div class="panel-heading">All Sales list</div>
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead class="thead-light" style="">
<tr>
<th>S/N</th>
<th>Sales ID</th>
<th>Proudct ID</th>
<th>Product Name</th>
<th>Unit Price(KES)</th>
<th>Quantity</th>
<th>Total price(KSH)</th>
<th>Note</th>
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
<td>{{ $item->order_id }}</td>
<td>{{ $item->customer_id }}</td>
<td>{{ $item->customer_name }}</td>
<td>{{ $item->customer_email }}</td>
<td>{{ $item->customer_phone }}</td>
<td>{{ $item->amount }}</td>
<td>{{ $item->payment_status }}</td>
<td>{{ $item->order_item }}</td>
<td>{{ $item->number_items }}</td>

<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
<td> <a href="#" class="btn btn-sm btn-primary updatesales" data-toggle="modal" data-target="#updateModal"  data-id ="{{$item->id}}">Update</a>
    <a  onclick = "confirmation(event)"href="{{route('delete.order',$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>
</td>

</tr>
@php
$totalAmount += $item->amount;
@endphp
@endforeach
<tr>
<td colspan="7"></td>
<td><strong>Total:</strong></td>
<td>{{ $totalAmount }}</td>
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
        <form action="{{route('updateorder')}}" method="POST">
            @csrf
        <div class="modal-body">
         <input type="hidden" id="orderid" class="form-control" name="id">
         <div class="form-group">
            <label for="exampleFormControlInput1">Product</label>
            <input type="text" class="form-control" id="product_id" name="product_id">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Customer</label>
            <input type="text" class="form-control" id="customer_id" name="customer_id">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Unit Price</label>
            <input type="text" class="form-control" id="unit_price" name="unit_price">
          </div>
      
          <div class="form-group">
            <label for="exampleFormControlInput1">Total price</label>
            <input type="text" class="form-control" id="total_price" name="tota_price">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Notes</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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