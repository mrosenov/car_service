<?php

namespace App\Http\Controllers;

use App\Models\CarInfoModel;
use App\Models\ClientInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClientInfoController extends Controller
{
    public function list_of_clients(ClientInfoModel $clients,CarInfoModel $car_info) {

        return view('client/list_of_clients',[
            "clients" => $clients::all(),
        ]);
    }

    public function client_info_view(ClientInfoModel $client) {
        $client_info = $client->where('id',$client->id)->get()->first();

        return view('client/client_info',[
            "client_info" => $client_info,
        ]);
    }

    public function add_client_view() {
        return view('client/add_client');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required|max:40',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
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

    public function update(Request $request,ClientInfoModel $client) {
        $this->validate($request,[
            'name' => 'required|max:40',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
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
