<?php use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    <title> Service Details </title>

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
{{-- ============================================================== --}}

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
{{-- ============================================================== --}}






{{-- DropDown --}}
{{-- ============================================================== --}}


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

{{-- ============================================================== --}}





{{-- Content --}}
{{-- ============================================================== --}}

                <div class="container-fluid">
                    <div class="row">

                        <div class="input-group mb-3" >
                            <img style="margin:auto" src="{{URL::asset('image/' . $service->image)}}" alt="" width="300px" height="300px">
                        </div>

                        <br>
                        @if (Auth::user()->type == 's.p')

                        <form action="{{url('service/update' , $service->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Title</span>
                            </div>
                            <input name="title" value="{{$service->title}}" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            @error('title')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Description</span>
                            </div>
                            <input name="description" value="{{$service->description}}" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            @error('description')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Price</span>
                            </div>
                            <img src="" alt="">
                            <input name="price" value="{{$service->price}}" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">$
                            @error('price')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="file" name="image">
                        <p>change service image ( optional )</p>
                        <br>
                        <input type="submit" value="update" style="margin:auto" class="btn btn-warning">
                            @if(Session::has('update'))
                                <div class="alert alert-primary" role="alert">
                                    {{Session::get('update')}}
                                </div>
                            @endif
                        </form>
                        @endif





                        @if (Auth::user()->type == 'admin')

                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Title</span>
                            </div>
                            <input disabled name="title" value="{{$service->title}}" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Description</span>
                            </div>
                            <input disabled  name="description" value="{{$service->description}}" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default" >Price</span>
                            </div>
                            <input disabled name="price" value="{{$service->price}}$" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">                        </div>

                            <form action="{{url('service/delete' , $service->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete Service</button>

                            </form>
                        @endif





                        <div class="input-group mb-3">
                        <h2 style="margin: auto">Orders</h2>
                        </div>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order Status</th>
                            @if (Auth::user()->type == 'admin')
                                <th>Delete</th>
                            @endif
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($order as $o)
                            <tr>
                            <td>{{ User::find($o->user_id)->name }}</td>
                            <td>
                                @if ($o->status == 'initiated')
                                    <p style="color: rgb(224, 224, 255)"> {{$o->status}}</p>
                                @endif
                                @if ($o->status == 'processing')
                                    <p style="color: yellow"> {{$o->status}}</p>
                                @endif
                                @if ($o->status == 'completed')
                                    <p style="color: rgb(11, 255, 11)"> {{$o->status}}</p>
                                @endif

                            </td>
                            @if (Auth::user()->type == 'admin')
                                <td>
                                    <form action="{{url('order/delete' , $o->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete Order</button>

                                    </form>
                                </td>
                            @endif
                            </tr>
                            @empty
                            <tr>
                                <td><h3>There is no order unitl now</h3></td>
                                <td><h3>There is no order unitl now</h3></td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                        @if(Session::has('order_delete'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('order_delete')}}
                        </div>
                        @endif
                    </div>
                    <!-- Content Row -->
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



{{-- ============================================================== --}}




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
