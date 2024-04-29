    @extends('admin.admindashboard')

    @section('content')
  <div class="mb-2"> 
<button class="btn btn-primary btn-sm addorder" data-toggle="modal" data-target="#addModal">Add direct order</button>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">All orders list</div>
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
    <thead class="thead-light" style="">
    <tr>
    <th>S/N</th>
    <th>Order Number</th>
    <th>Customer ID</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Phone Number</th>
    <th>Amount(KSH)</th>
    <th>Payment status</th>
    <th>Order item</th>
    <th>Quantity</th>
    <th>Order status</th>
    <th>Order date</th>
    <th>Action</th>
   
    </tr>
    </thead>
    <tbody>
    @php
    $totalAmount = 0;
    @endphp
    @foreach ($orders as $index => $item)
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
    <td>{{ $item->quantity}}</td>
    <td>
      @if($item->order_status == 'pending')
          <span class="badge bg-warning">{{ $item->order_status }}</span>
      @elseif($item->order_status == 'completed')
          <span class="badge bg-success">{{ $item->order_status }}</span>
      @elseif($item->order_status == 'processing')
          <span class="badge bg-secondary">{{ $item->order_status }}</span>
      @else
      <span class="badge bg-danger">{{ $item->order_status}}</span>
      @endif
  </td>
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
    <td> <a href="#" class="btn btn-sm btn-primary updateorder" data-toggle="modal" data-target="#updateModal"  data-id ="{{$item->id}}">Update</a>
        <a  onclick = "confirmation(event)"href="{{route('delete.order',$item->id)}}"><button class="btn btn-sm btn-danger">Delete</button></a>
    </td>
   
    </tr>
    @php
    $totalAmount += $item->amount;
    @endphp
    @endforeach
    <tr>
    <td colspan="6"></td>
    <td><strong>Total:</strong></td>
    <td>{{ $totalAmount }}</td>
    <td colspan="5"></td>
    </tr>
    </tbody>
    </table>


    </div>

    
    </div>


    <div class="modal" id="updateModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update order details</h4>
              
            </div>
            
            <!-- Modal body -->
            <form action="{{route('updateorder')}}" method="POST">
                @csrf
            <div class="modal-body">
             <input type="hidden" id="orderid" class="form-control" name="id">
             <div class="form-group">
                <label for="exampleFormControlInput1">Order Number</label>
                <input type="text" class="form-control" id="order_id" readonly>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Customer Number</label>
                <input type="text" class="form-control" id="customer_number" readonly>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" readonly>
              </div>
          
              <div class="form-group">
                <label for="exampleFormControlInput1">Payment status</label>
             <select class="form-control" name="payment_status" id="payment_status">
                <option selected disabled>Select payment status</option>
                <option value="paid">Paid</option>
                <option value="pending">Pending</option>
                <option value="void">void</option>
             </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Item name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" readonly>
              </div>

              <div class="form-group">
                <label for="exampleFormControlInput1">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="number_items">
              </div>

              {{-- <div class="form-group">
                <label for="exampleFormControlInput1">Unit price</label>
                <input type="text" class="form-control" id="perunit" name="unit_price">
              </div> --}}

              <div class="form-group">
                <label for="exampleFormControlInput1">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Order status</label>
             <select class="form-control" name="order_status" id="order_status">
                <option selected disabled>Select order status</option>
                <option value="processing">processing</option>
                <option value="pending">pending </option>
                <option value="completed">completed</option>
                <option value="cancelled">cancelled</option>
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


 {{-- add direct order --}}

 <div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create direct order</h4>
        
      </div>
      
      <!-- Modal body -->
      <form action="{{route('addorder')}}" method="POST">
          @csrf
      <div class="modal-body"> 

        <div class="form-group">
          <label for="exampleFormControlInput1">Customer Name</label>
          <input type="text" class="form-control" id="" name="customer_name" required>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Customer Email</label>
          <input type="email" class="form-control" id="" name="customer_email" required>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Customer phone</label>
          <input type="text" class="form-control" id="" name="customer_phone" required >
        </div>
    
        <div class="form-group">
          <label for="exampleFormControlInput1">Payment status</label>
       <select class="form-control" name="payment_status">
          <option selected disabled>Select payment status</option>
          <option value="paid">Paid</option>
          <option value="pending">Pending</option>
          <option value="void">void</option>
       </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Item name</label>
          <select type="text" class="form-control item_name" id="" name="item">
         <option disabled selected>  Select item</option>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Quantity</label>
          <input type="text" class="form-control qty" id="" name="quantity">
        </div>


        <div class="form-group">
          <label for="exampleFormControlInput1">Price per unit</label>
          <input type="text" class="form-control unitprice" id="" readonly>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Total amount</label>
          <input type="text" class="form-control" id="cost" name="amount" readonly>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Order status</label>
       <select class="form-control" name="order_status">
          <option selected disabled>Select order status</option>
          <option value="processing">processing</option>
          <option value="pending">pending </option>
          <option value="completed">completed</option>
          <option value="cancelled">cancelled</option>
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

    
    
    @endsection