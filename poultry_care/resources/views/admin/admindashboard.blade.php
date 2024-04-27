
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css">>
  <script src="https://www.gstatic.com/charts/loader.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{ asset('js/multiselect-dropdown.js') }}"></script>

    <title>admin dashboard</title>
    </head>

    <body>
    {{-- @include('sweetalert::alert') --}}
    <div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar" style="background: #03a84e">
    <div class="h-100">
    <div class="sidebar-logo">
    <a href="#">Poultry Care</a>
    <i class="fa-solid fa-kiwi-bird"></i>
    </div>
    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav">
    <li class="sidebar-header">
    Tools & Components
    </li>

    </li>
    <li class="sidebar-item">
    <a href="{{route('admin.dashboard')}}" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#pages"
        aria-expanded="false" aria-controls="pages">
        <i class="fa fa-home" aria-hidden="true"></i>
    Dashboard
    </a>
    {{-- <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item">
            <a href="" class="sidebar-link">All subjects</a>
        </li>
        <li class="sidebar-item">
            <a href="" class="sidebar-link">Add Subject</a>
        </li>
        
    </ul> --}}
    </li>

    <li class="sidebar-item">
    <a href="{{route('all.sales')}}" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#multi"
        aria-expanded="false" aria-controls="multi">
        <i class="fa fa-money" aria-hidden="true"></i>
        Sales
    </a>
    {{-- <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                More
            </a>
            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">All Students</a>
                </li>
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">Add student</a>
                </li>
            </ul>
        </li>
        
    </ul> --}}
    </li>

    <li class="sidebar-item">
    <a href="{{route('customer.orders')}}" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Orders
    </a>
    {{-- <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">update Profile</a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('logout')}}" class="sidebar-link" title="logout">Logout</a>
        </li>
    </ul> --}}
    </li>

    <li class="sidebar-item">
    <a href="{{route('all.inventory')}}" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-tasks" aria-hidden="true"></i>
       Inventory
    </a>

    </li>

    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-asterisk" aria-hidden="true"></i>
        Batch Flock records
    </a>

    </li>

    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-asterisk" aria-hidden="true"></i>
        Hatchery records
    </a>

    </li>
    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-asterisk" aria-hidden="true"></i>
    Vaccination records
    </a>

    </li>

    <li class="sidebar-header">
    Farm settings
    </li>
    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-list" aria-hidden="true"></i>
        Expense Management
    </a>

    </li>
    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-list" aria-hidden="true"></i>
    Stock Management
    </a>

    </li>
    <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fa fa-list" aria-hidden="true"></i>
        Income Management
    </a>

    </li>
    </ul>
    </div>
    </aside>
    <!-- Main Component -->
    <div class="main">
    <nav class="navbar navbar-expand px-3 border-bottom">
    <!-- Button for sidebar toggle -->
    <button class="btn" type="button" data-bs-theme="dark">
    <span class="navbar-toggler-icon" style="color:#03a84e"></span>
    </button>
    <div  class="sidebar-link" style="margin-left:85%;">
    <div>

    </div>

    <h3 style="font-size: 12px position-relative"> <i class="fa fa-user" aria-hidden="true">
 
    
    </i> {{Auth::user()->name}}
    <a href="{{route('pending.orders')}}" >
    <span class="translate-middle badge rounded-pill bg-success">
    {{$new}}
      </span> 
    </a>
    </h3>

    </div>
    <div>
    <a href="{{route('admin.logout')}}" class="sidebar-link"><i class="fa fa-power-off" aria-hidden="true"></i></a>
    </div>
    </nav>


    <main class="content px-3 py-2">
    <div class="container-fluid">
    <div class="mb-3">

    @yield('content')


    </div>
    </div>
    </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('js/script.js')}}"></script>



    @if (Session::has('message'))
    <script>
    toastr.options = {
    'progressBar': true,
    'closeButton': true,
    'positionClass': 'toast-top-right', 
    'showDuration': '300',
    'hideDuration': '1000',
    'timeOut': '5000',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'fadeIn',
    'hideMethod': 'fadeOut',
    'onShown': function () {

    $('.toast').css('background-color', '#28a745'); 
    $('.toast').css('color', '#fff'); 
    }
    };
    toastr.success("{{ Session::get('message') }}", 'Success!', { timeOut: 3000 });
    </script>
    @endif
    <script>

    function confirmation(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);

    swal({
    title: 'Are you sure to delete',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
    customClassName: {
    popup: 'swal-small', 
    },
    })

    .then((willCancel) => {
    if (willCancel) {
    window.location.href = urlToRedirect;
    }
    });
    }

    </script>
     <script>
        $(document).ready(function(){
            $('.updateorder').click(function(){
                var id = $(this).attr('data-id');
                $('#orderid').val(id);
                $.ajax({
                    url: "{{ route('orderdetails') }}",
                    type: "GET",
                    data: { id: id },
                    success: function(response){
                       var data = response.data;
                     $('#customer_name').val(data.customer_name);
                     $('#customer_email').val(data.customer_);
                     $('#order_id').val(data.order_id);
                     $('#customer_number').val(data.customer_id);
                     $('#customer_phone').val(data.customer_phone);
                     $('#item_name').val(data.order_item);
                     $('#quantity').val(data.quantity);
                     $('#amount').val(data.amount);
                     $('#payment_status').val(data.payment_status);
                     $('#order_status').val(data.order_status);
                    }
                 
                });
            });

            $('.updateinventory').click(function(){

            var invid = $(this).attr('data_id');
            $('#inventoryid').val(invid);

            $.ajax({
        
            url : "{{route('getproduct')}}",
            type: 'Get',
            data:{id:invid},
            success :function(response){
               
 
         var data = response.data[0];
      
         $('.product_nam').val(data.product_name);
         $('.quantity').val(data.Quantity);
         $('.unit_type').val(data.unit);
         $('.product_price').val(data.product_price);

            }

            });
            });
        // add direct order
        $('.addorder').click(function(){
    $.ajax({
        url: "{{ route('allproducts') }}",
        type: 'GET',
        success: function(data) {
            $('#item_name').empty();
            $('#item_name').append('<option disabled selected>Select item</option>');
            data.data.forEach(function(product_name) {
                $('.item_name').append('<option value="' + product_name + '">' + product_name + '</option>');
            });
        }
    });

    $('.item_name').change(function(){
        var item = $(this).val();
        $.ajax({
            url: "{{ route('getprice') }}",
            type: "GET",
            data: {item: item},
            success: function(response) {
                var data = response.data;
                $('.unitprice').val(data);
                calculateTotal();
            }
        });
    });

    $('.qty').change(function(){
        calculateTotal();
    });
});

function calculateTotal() {
    var quantity = parseInt($('.qty').val());
    var unitPrice = parseFloat($('.unitprice').val());
    var totalAmount = quantity * unitPrice;
    console.log(totalAmount);
    $('#cost').val(totalAmount.toFixed(2));
}

        });
    </script>

    <script>
    
    $(document).ready(function(){
$('.addsales').click(function(){

 $.ajax({
       url: "{{ route('allproducts') }}",
        type: 'GET',

        success:function(data){
     
         $('#product').empty();
         $('#product').append('<option disabled selected>Select item</option>');
           
         data.data.forEach(function(product_name) {
        
        $('#product').append('<option value="' + product_name + '">' + product_name + '</option>');
            });
        }
 })
 $('#product').change(function(){
        var item = $(this).val();
        $.ajax({
            url: "{{ route('getprice') }}",
            type: "GET",
            data: {item: item},
            success: function(response) {
                var data = response.data;
                $('#unitprice').val(data);
                calculateTotal();
            }
        });
    });

    $('#discount').change(function(){
        calculateTotal();
    });
});
function calculateTotal() {
    var quantity = parseInt($('.qty').val());
    var unitPrice = parseFloat($('#unitprice').val());
    var discount = parseFloat($('#discount').val());
    var totalAmount = (quantity * unitPrice) - discount;
    console.log(totalAmount);
    $('.cost').val(totalAmount.toFixed(2));
}

    });
     </script>

<script>
    $(document).ready(function() {
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    });

    function drawChart() {
        var quantityOrders = {!! json_encode($quantityOrders) !!};
        var salesData = {!! json_encode($salesData) !!};

        // Prepare data for Google Charts
        var data = [];
        data.push(['Month', 'Quantity', 'Sales']);

        var months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Initialize quantities and sales for all months to zero
        var quantities = Array(12).fill(0);
        var sales = Array(12).fill(0);

        // Update quantities with actual data
        quantityOrders.forEach(function(order) {
            quantities[order.month - 1] = order.total_quantity;
        });

        // Update sales with actual data
        salesData.forEach(function(sale) {
            sales[sale.month - 1] = sale.total_price;
        });

        // Populate data array
        for (var i = 0; i < 12; i++) {
            data.push([months[i], quantities[i], sales[i]]);
        }

        var chartData = google.visualization.arrayToDataTable(data);

        var options = {
            title: 'Monthly Order Record and Sales',
            legend: { position: 'bottom' },
            hAxis: { title: 'Month' },
            vAxis: { title: 'Amount' }, 
            series: {
                0: { targetAxisIndex: 0 }, 
                1: { targetAxisIndex: 0 } 
            },
            vAxes: {
                0: { title: 'Amount of sales in KES  & quantity of orders' } 
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(chartData, options);
    }
</script>


    </body>

    </html>

