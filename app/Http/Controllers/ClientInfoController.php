<?php

namespace App\Http\Controllers;

use App\Models\ClientInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientInfoController extends Controller
{
    public function list_of_clients(ClientInfoModel $clients) {
        return view('client/list_of_clients',[
            "clients" => $clients::all()
        ]);
    }

    public function list_of_clients_cars(ClientInfoModel $clients) {
        return view('client/list_of_client_cars',[
            "clients" => $clients::all()
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
}
