<?php

namespace App\Http\Controllers;

use App\Models\ClientInfoModel;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ClientInfoController extends Controller
{
    public function list_of_clients(ClientInfoModel $clients) {
        return view('client/list_of_clients',[
            "clients" => $clients::all()
        ]);
    }

    public function add_client_view() {
        return view('client/add_client');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required|max:40',
            'phone' => 'required|max:11',
        ]);

        $client = new ClientInfoModel();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->save();
        return redirect('clients/add')->with('success', $client->name.' е добавен като клиент.');
    }
}
