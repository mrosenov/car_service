<?php

namespace App\Http\Controllers;

use App\Models\CarInfoModel;
use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use App\Models\ClientInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClientInfoController extends Controller
{
    public function list_of_clients(ClientInfoModel $clients) {

        return view('client/list_of_clients',[
            'clients' => $clients::all(),
        ]);
    }

    public function client_info_view(ClientInfoModel $client,CarMakesModel $car_makes,CarModelsModel $car_models) {
        $client_info = $client->where('id',$client->id)->get()->first();

        return view('client/client_info',[
            'client_info' => $client_info,
            'car_makes' => $car_makes::all(),
            'car_models' => $car_models::all(),
        ]);
    }

    public function add_client_view() {
        return view('client/add_client');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required|max:40',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
        ]);


        $client = new ClientInfoModel();

        //check if car make exists if so return error
        if (DB::table('client_info')->where('phone', $request->phone)->exists()) {
            return redirect('clients/add')->with('error','Съществува клиент с номер'." ".$request->phone);
        }

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->save();
        return redirect('clients/add')->with('success', $client->name.' е добавен като клиент.');
    }

    public function add_client_car(Request $request,ClientInfoModel $client) {
        $this->validate($request,[
            'make' => 'required',
            'model' => 'required',
            'regplate' => 'required|min:7|max:8',
            'vin' => 'required|min:17|max:18',
        ]);

        $client_car = new CarInfoModel();

        if (DB::table('car_info')->where('reg_plate', $request->regplate)->orWhere('vin', $request->vin)->exists()) {
            return redirect::back()->with('error','Съществува автомобил с такъв рег.номер или VIN');
        }

        $client_car->ownerID = $client->id;
        $client_car->car_make = $request->make;
        $client_car->car_model = $request->model;
        $client_car->reg_plate = $request->regplate;
        $client_car->vin = $request->vin;
        $client_car->save();
        return redirect::back()->with('success', 'Успешно добавихте кола към клиента');
    }

    public function update(Request $request,ClientInfoModel $client) {
        $this->validate($request,[
            'name' => 'required|max:40',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
        ]);

        $client = ClientInfoModel::find($client->id);

        if (DB::table('client_info')->where('id','!=',$client->id)->where('phone', $request->phone)->exists()) {
            return redirect::back()->with('error','Съществува клиент с номер'." ".$request->phone);
        }

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->update();
        return redirect::back()->with('success', $client->name.' e редактиран.');
    }

    public function destroy(ClientInfoModel $client) {
        $client = ClientInfoModel::find($client->id);
        $client->delete();
        return redirect::back()->with('success', $client->name.' e изтрит.');
    }
}
