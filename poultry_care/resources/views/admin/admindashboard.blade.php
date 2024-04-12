
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script href="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script href="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script href= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script href = "https://code.jquery.com/jquery-3.7.1.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css.">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

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
    <a href="" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#multi"
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
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
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
    <a href="#" class="sidebar-link collapsed1" data-bs-toggle="collapse1" data-bs-target="#auth"
        aria-expanded="false" aria-controls="auth">
        <i class="fas fa-wallet" aria-hidden="true"></i>
    Direct Sales
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
    <span class="navbar-toggler-icon"></span>
    </button>
    <div  class="sidebar-link" style="margin-left:85%;">
    <div>

    </div>

    <h3 style="font-size: 12px"> <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}</h3>

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
    customClass: {
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


    </body>

    </html>

