<?php

namespace App\Http\Controllers;

use App\Models\CarInfoModel;
use App\Models\ClientInfoModel;
use Illuminate\Http\Request;

class CarInfoController extends Controller
{
    public function list_client_cars(CarInfoModel $carinfo, ClientInfoModel $client) {

        $info = $carinfo->where('ownerID',$carinfo->ownerID)->get();
        $client_info = $client::find($carinfo->ownerID);
        $client_exists = $carinfo->where('ownerID',$carinfo->ownerID)->count();

        return view('client/list_of_client_cars',[
            'client' => $client_info,
            'check_client' => $client_exists,
            'carinfo' => $info,
        ]);
    }
}
