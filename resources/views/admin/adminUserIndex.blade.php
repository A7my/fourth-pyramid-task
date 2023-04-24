<?php use App\Models\Category;
use Illuminate\Support\Facades\Auth;

?>

@extends('layout.dashboard')



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

<a href="{{url('admin/adminUser/admin')}}" class="btn btn-google btn-block">Admins</a>
<a href="{{url('admin/adminUser/user')}}" class="btn btn-facebook btn-block"> Users</a>
<a href="{{url('admin/adminUser/create')}}" class="btn btn-facebook btn-block"> Create Admin or User</a>

@endsection
