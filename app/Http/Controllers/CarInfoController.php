<?php

namespace App\Http\Controllers;

use App\Models\CarInfoModel;
use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use App\Models\ClientInfoModel;
use App\Models\RepairInfoModel;
use App\Models\ReplacedPartsInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function edit_client_car_view(CarInfoModel $carinfo,CarMakesModel $car_makes, CarModelsModel $car_models, ClientInfoModel $client) {
        $info = $carinfo->where('id', $carinfo->id)->get()->first();
        $clientinfo = $client->where('id', $info->ownerID)->get()->first();
        return view('client/edit_client_car',[
            'carinfo' => $info,
            'client' => $clientinfo,
            'clients' => $client::all(),
            'car_makes' => $car_makes::all(),
            'car_models' => $car_models::all(),
        ]);
    }

    public function car_repairs_view($id,RepairInfoModel $rinfo) {
        $repair_info = $rinfo->where('car_info_id', $id)->get()->first();
        $list_repairs = $rinfo->where('car_info_id', $id)->get();

        return view('repairs/list_of_car_repairs', [
            'repair_info' => $repair_info,
            'list_repairs' => $list_repairs,
            'AllCarRepairsPrice' => $this->AllCarRepairsTotalPrice($id),
        ]);
    }

    public function AllCarRepairsTotalPrice($id) {
        $carRepairsTotalPrice = DB::table('repair_info')->where('car_info_id', $id)->sum(DB::raw('totalPrice'));
        return $carRepairsTotalPrice;
    }

    public function update($id,Request $request) {
        $this->validate($request,[
            'newowner' => 'required',
            'make' => 'required',
            'model' => 'required',
            'regplate' => 'required',
            'vin' => 'required|min:17|max:17',
        ]);

        $carInfo = CarInfoModel::find($id);
        $currentCarInfo = $carInfo->where('id', $id)->get()->first();

        if ($currentCarInfo->ownerID != $request->newowner) {
            $carInfo->ownerID = $request->newowner;
        }
        else {
            $carInfo->ownerID = $currentCarInfo->ownerID;
        }

        if ($currentCarInfo->car_make != $request->make) {
            $carInfo->car_make = $request->make;
        }
        else {
            $carInfo->car_make = $currentCarInfo->car_make;
        }

        if ($currentCarInfo->car_model != $request->model) {
            $carInfo->car_model = $request->model;
        }
        else {
            $carInfo->car_model = $currentCarInfo->car_model;
        }

        if ($currentCarInfo->reg_plate != $request->regplate) {
            $carInfo->reg_plate = $request->regplate;
        }
        else {
            $carInfo->reg_plate = $currentCarInfo->reg_plate;
        }

        if ($currentCarInfo->vin != $request->vin) {
            $carInfo->vin = $request->vin;
        }
        else {
            $carInfo->vin = $currentCarInfo->vin;
        }
        $carInfo->update();
        return redirect::back()->with('success','Автомобилът e редактиран.');
    }

    public function destroy(CarInfoModel $carinfo) {
        $car = CarInfoModel::find($carinfo->id);
        $car->delete();
        return redirect::back()->with('success', 'Автомобилът с номер '.$car->reg_plate.' e изтрит.');
    }
}
