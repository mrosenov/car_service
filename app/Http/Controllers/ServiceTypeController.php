<?php

namespace App\Http\Controllers;

use App\Models\ServiceTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ServiceTypeController extends Controller
{
    public function service_type_view() {
        return view('service/add_service_type');
    }

    public function list_service_type_view(ServiceTypeModel $service_types) {

        return view('service/list_of_services',[
            'service_types' => $service_types::all(),
        ]);
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $service_type = new ServiceTypeModel();

        if (DB::table('service_type')->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', 'Категорията '.$request->name.' вече съществува');
        }

        $service_type->name = $request->name;
        $service_type->save();
        return redirect::back()->with('success', 'Категорията '.$service_type->name.' е добавена успешно');
    }
}
