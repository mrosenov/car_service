<?php

namespace App\Http\Controllers;

use App\Models\ServiceSubTypeModel;
use App\Models\ServiceTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ServiceSubTypeController extends Controller
{
    public function service_subtype_view(ServiceTypeModel $service_type) {
        return view('service/add_service_subtype',[
            'service_types' => $service_type::all(),
        ]);
    }

    public function list_service_subtypes_view(ServiceTypeModel $service_type,ServiceSubTypeModel $service_subtypes) {
        $subtypes = $service_subtypes->where('service_type',$service_type->id)->get();

        return view('service/list_of_service_subtypes',[
            'service_subtypes' => $subtypes,
        ]);
    }

    public function edit_service_subtype_view($id, ServiceSubTypeModel $service_subtypes) {

        $service_subtype = $service_subtypes->where('id', $id)->get()->first();

        return view('service/edit_service_subtype',[
            'service_subtype' => $service_subtype,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request,[
            'servicetype' => 'required',
            'name' => 'required',
        ]);

        $service_subtype = new ServiceSubTypeModel();

        if (DB::table('service_subtype')->where('name',$request->name)->where('service_type',$request->servicetype)->exists()) {
            return redirect::back()->with('error','Услугата '.$service_subtype->name.' вече съществува в тази категория.');
        }

        $service_subtype->name = $request->name;
        $service_subtype->service_type = $request->servicetype;
        $service_subtype->save();

        return redirect::back()->with('success', 'Услугата '.$service_subtype->name.' е успешно добавена.');
    }

    public function update($id, Request $request) {
        $this->validate($request,[
           'name' => 'required',
        ]);

        $service_subtype = ServiceSubTypeModel::find($id);

        if (DB::table('service_subtype')->where('name',$request->name)->where('service_type',$request->servicetype)->exists()) {
            return redirect::back()->with('error','Услугата '.$service_subtype->name.' с категория'.$service_subtype->service_type.' вече съществува.');
        }

        $service_subtype->name = $request->name;
        $service_subtype->update();

        return redirect::back()->with('success', $service_subtype->name.' e редактиран успешно.');
    }

    public function destroy($id) {
        $service_subtype = ServiceSubTypeModel::find($id);
        $service_subtype->delete();
        return redirect::back()->with('success', $service_subtype->name.' е успешно изтрита');
    }
}
