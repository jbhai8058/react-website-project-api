<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function ServiceView(){
        $sevice = Service::latest()->get();
        return $sevice;
    } // end method
}
