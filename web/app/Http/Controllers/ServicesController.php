<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Service::query()->orderBy("position", 'asc')->get();
        return view('pages.services.services_list',[
            'services' => $services
        ]);
    }

    public function detail($id){
        $services = Service::query()->findOrFail($id);
        return view('pages.services.detail_services',[
            'services'=>$services
        ]);
    }
}
