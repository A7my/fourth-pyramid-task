@extends('layout.dashboard')


<?php use App\Models\Category;
use App\Models\Bought;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

?>





@section('alerts')


    @if(Auth::user()->role != 'user')

        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{Auth::user()->unreadNotifications->count()}}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>


    @forelse (Auth::user()->unreadNotifications  as $not)
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{$not->created_at}}</div>
                <span class="font-weight-bold">{{$not->data['name']}} has bought a {{$not->data['product']}} with {{$not->data['price']}}$</span>
            </div>
    </a>
    @empty

<span class="font-weight-bold">You Notofication is empty</span>
@endforelse




        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>

@endif
@endsection




@section('information')
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
        <img class="img-profile rounded-circle" src="{{URL::asset('assets/img/undraw_profile.svg')}}">
    </a>



    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


    @if (Auth::user()->role == 's.admin')
    <a class="dropdown-item" href="{{url('admin/adminUser')}}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Admins and Users Settings
    </a>
    <a class="dropdown-item" href="{{url('admin/products')}}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Products Settings
    </a>
    <a class="dropdown-item" href="{{url('admin/category')}}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Categories Settings
    </a>
    <div class="dropdown-divider"></div>
    @endif

    @if (Auth::user()->role == 'admin')
    <a class="dropdown-item" href="{{url('jadmin/category')}}">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Your Categories Settings
    </a>
    <div class="dropdown-divider"></div>
    @endif



    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
    </div>

@endsection



@section('categories')



@foreach ($products as $pro)

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                {{$pro->name}}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{$pro->price}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                        <form action="{{route('bought.store')}}" method="POST">
                                            @csrf
                                            <input name="product" type="text" hidden value="{{$pro->id}}" >
                                            <button type="submit" href="#" style="margin-left: 20px" class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div  class="text-xs font-weight-bold text-primary text-uppercase mb-1">




                                        <a data-toggle="modal" data-target="#buyers">
                                            <p> {{Bought::where('product_id' , $pro->id)->count() }} people have bought this item</p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>


@endforeach


@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif

@endsection


