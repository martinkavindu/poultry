    @extends('admin.admindashboard')

    @section('content')
    <div class="dashboard">
    <h3> Dashboard</h3>
    </div>

    <div class="panel-body">
    <div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6">
    <div class="small-box bg-primary">
    <div class="inner text-center">
    <h3 id="regmembers">30</h3>
    <p>Total Customers</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-users"></i>
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
    <h3 id="regmembers">{{ number_format($total,2) }}</h3>
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
    <h3 id="regmembers"> KSH 160000.00</h3>
    <p>Last 30 Days Sales</p>
    </div>
    <div class="icon text-center">
    <i class="fa fa-money" aria-hidden="true"></i>
    </div>
    <div class="small-box-footer">
    <a href="" class="moreinfo">
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


    @endsection