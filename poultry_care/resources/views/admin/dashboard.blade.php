    @extends('admin.admindashboard')

    @section('content')
    {{-- <div class="dashboard">
    <h3> Dashboard</h3>
    </div> --}}

    <div class="panel-body">
    <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-primary">
    <div class="inner text-center">
    <h3 id="regmembers"><b>{{number_format($total)}}</b></h3>
    <p>Total Customers</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-users"></i>
    </div>
    <div class="small-box-footer">
    <a href="{{route('customers')}}" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
    <h3 id="regmembers"><b>{{ number_format($total) }}</b></h3>
    <p>Total Orders</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
    </div>
    <div class="small-box-footer">
    <a href="{{route('customer.orders')}}" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-warning">
    <div class="inner text-center">
    <h3 id="regmembers"><b> {{number_format($salesTotal,2)}} KES</b></h3>
    <p>Total Sales</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-money" aria-hidden="true"></i>
    </div>
    <div class="small-box-footer">
    <a href="{{route('all.sales')}}" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-danger">
    <div class="inner text-center">
    <h3 id="regmembers">0</h3>
    <p>Last 30 Days Eggs Damaged</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-credit-card" aria-hidden="true"></i>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    </div>
    <br/>
    <br/>

    <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
    <h3 id="regmembers"></h3>
    <p style="padding:20px">Batch Flock</p>
    </div>
    <div class="text-center datas">
    <span>This Month:</span>
    <br/>
    <span>Today:</span>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
    <h3 id="regmembers"></h3>
    <p style="padding:20px">Eggs Incubated</p>
    </div>
    <div class="text-center datas">
    <span>This Month:</span>
    <br/>
    <span>Today:</span>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
    <h3 id="regmembers"></h3>
    <p style="padding:20px">Hatchery</p>
    </div>
    <div class="text-center datas">
    <span>This Month:</span>
    <br/>
    <span>Today:</span>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
    <h3 id="regmembers"></h3>
    <p style="padding:20px">Vaccination</p>
    </div>
    <div class="text-center datas">
    <span>This Month:</span>
    <br/>
    <span>Today:</span>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
    More info <i class="fa fa-arrow-circle-right"></i>
    </a>
    </div>
    </div>
    </div>
    </div>
    </div>

   
    <div class="panel panel-default">
        <div class="panel-heading"> <h3 style="color: black">  <i class="fa fa-area-chart" aria-hidden="true"></i> Statistics</h3></div>
    <div class="panel-body">

        <div id="chart_div" style="height: 300px;"></div>
    </div>

     
    </div>





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
            vAxis: { title: 'Amount' }, // Common y-axis title
            series: {
                0: { targetAxisIndex: 0, color: 'blue' }, // Quantity orders color
                1: { targetAxisIndex: 0, color: 'green' } // Sales color
            },
            vAxes: {
                0: { title: 'Amount of sales in KES and total quantity in order' } // Common y-axis
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(chartData, options);
    }
</script>


    
    @endsection