<?php use Illuminate\Support\Facades\Auth;
use App\Models\Service;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard </title>

    <!-- Custom fonts for this template-->
    <link href="{{URL::asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


        </ul>


        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">


        <!-- End of Sidebar -->
                <!-- Topbar -->

                {{-- ALERT --}}
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3</span>
                            </a> --}}
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>



                        <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">1212</div>
                                    <span class="font-weight-bold">asdf has bought a asdf with 12$</span>
                                </div>
                        </a>




                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>




                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">





                            {{-- DropDown --}}
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle" src="{{URL::asset('assets/img/undraw_profile.svg')}}">
                            </a>



                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                @if (Auth::user()->type == 'admin')
                                <a class="dropdown-item" href="{{url('customers/setting')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Customers Settings
                                </a>

                                <a class="dropdown-item" href="{{url('serviceProviders/setting')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Service Providers Settings
                                </a>


                                @endif



                                @if (Auth::user()->type == 's.p')


                                @if (Auth::user()->account_status == 'active')
                                <a class="dropdown-item" href="{{url('create')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Create A Service
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{url('setting')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Your Settings
                                </a>
                                @endif



                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            </div>
                        </li>
                    </ul>
                </nav>





                {{-- Content --}}

                <div class="container-fluid">
                    <div class="row">




                        @if (Auth::user()->type == 'admin')
                        <?php $services = Service::get(); ?>
                        @forelse ($services as $s)

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <img src="{{URL::asset('Image/'. $s->image)}}" alt="" width="200px" height="100px">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                {{-- <a href="" style="color: green"> 3 Items </a> --}}
                                            </div>
                                            <a href="{{url('service' , $s->id)}}">  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s->title}}</div></a>
                                            <p>{{$s->description}}</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <h2>There is no services until now</h2>
                        @endforelse
                        @endif



                        @if (Auth::user()->type == 's.p')
                        <?php $services = Auth::user()->service;?>
                        {{-- Create Service --}}
                        @forelse ($services as $s)

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <img src="{{URL::asset('Image/'. $s->image)}}" alt="" width="200px" height="100px">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                {{-- <a href="" style="color: green"> 3 Items </a> --}}
                                            </div>
                                            <a href="{{url('service' , $s->id)}}">  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s->title}}</div></a>
                                            <p>{{$s->description}}</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @empty
                        <h2>You have no services until now</h2>
                        @endforelse
                        @endif

                    </div>
                    @if (Session::has('delete_service'))
                    <div class="alert alert-danger" role="alert">

                        {{Session::get('delete_service')}}
                    </div>
                    @endif
                    <!-- Content Row -->
                </div>
            </div>
        </div>
    </div>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>







    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form class="" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Log out</button>
                    </form>


            </div>
            </div>
        </div>

    </div>
    <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::asset('assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
