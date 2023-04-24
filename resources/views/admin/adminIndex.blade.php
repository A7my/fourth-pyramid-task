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


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>admins for</th>
            <th>Edit Categoies</th>
            <th>Update Role</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->category->pluck('name')}}</td>
            <td>
                <form action="{{url('admin/adminUser/changeCategory' , $user->id)}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" href="#" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <span class="text">Change Categories</span>
                </button>
                </form>
            </td>

            <td>
                <form action="{{url('admin/adminUser/changeRole' , $user->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <select name="role" id="" class="form-control form-control-user">
                        <option value="admin" selected="selected">admin</option>
                        <option value="user" >user</option>
                    </select>
                    <button href="#" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Update</span>
                    </button>
                </form>

            </td>


            <td>
                <form action="{{url('admin/adminUser/delete' , $user->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete user</span>
                    </button>
                </form>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection
