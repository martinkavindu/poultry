    @extends('admin.admindashboard')

    @section('content')

    <div class="panel panel-default">
    <div class="panel-heading">All orders list</div>
    <div class="panel-body">
    <table class="table table-striped" style="width:100%">
    <thead>
    <tr style="color: antiquewhite">
    <th style="color: antiquewhite">S/N</th>
    <th style="color: antiquewhite">Order Number</th>
    <th style="color: antiquewhite">Customer ID</th>
    <th style="color: antiquewhite">Customer Name</th>
    <th style="color: antiquewhite">Customer Email</th>
    <th style="color: antiquewhite">Phone Number</th>
    <th style="color: antiquewhite">Amount(KSH)</th>
    <th style="color: antiquewhite">Payment status</th>
    <th style="color: antiquewhite">Order item</th>
    <th style="color: antiquewhite">Quantity</th>
    <th style="color: antiquewhite">Order status</th>
    <th style="color: antiquewhite">Order date</th>
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
    <td>{{ $item->number_items }}</td>
    <td>{{ $item->order_status }}</td>
    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
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
    @endsection