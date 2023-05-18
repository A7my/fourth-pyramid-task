<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteServiceController extends Controller
{
    public function delete($id){
        $service = Service::destroy($id);
        return redirect('dashboard')->with('delete_service' , 'You have deleted a service');
    }
}
