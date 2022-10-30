<?php

namespace App\Http\Controllers;

use App\Models\CarInfoModel;
use App\Models\RepairInfoModel;
use App\Models\ReplacedPartsInfoModel;
use App\Models\ServiceSubTypeModel;
use App\Models\ServiceTypeModel;
use App\Models\WorkerInfoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class RepairInfoController extends Controller
{
    public function list_repairs_view(ReplacedPartsInfoModel $rparts) {

        return view('repairs/list_of_repairs',[
            'replaced_parts' => $rparts::all(),
        ]);
    }

    public function add_repair_view(WorkerInfoModel $workers,CarInfoModel $car_info, ServiceTypeModel $service_types, ServiceSubTypeModel $service_subtypes) {

        return view('repairs/add_repair', [
            'car_info' => $car_info::all(),
            'workers' => $workers::all(),
            'service_types' => $service_types::all(),
            'service_subtypes' => $service_subtypes::all(),
        ]);
    }

    public function view_repair($id, RepairInfoModel $rinfo) {
        $repair_info = $rinfo::find($id);
        $replaced_parts = $rinfo::find($id)->ReplacedParts;

        return view('repairs/view_repair', [
            'repair_info' => $repair_info,
            'replaced_parts' => $replaced_parts,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request,[
           'repairedcar' => 'required',
           'worker' => 'required',
           'partnumber' => 'required',
           'partname' => 'required',
           'partprice' => 'required',
           'servicetype' => 'required',
           'labourprice' => 'required',
        ]);

        $rinfo = new RepairInfoModel();
        $rinfo->car_info_id = $request->repairedcar;
        $rinfo->worker = $request->worker;
        $rinfo->save();

        for($i = 0; $i < count($request->partnumber); $i++)
        {
            ReplacedPartsInfoModel::create([
                'repair_info' => $rinfo->id,
                'partNumber' => $request->partnumber[$i],
                'partName' => $request->partname[$i],
                'partPrice' => $request->partprice[$i],
                'service' => $request->servicetype[$i],
                'labourPrice' => $request->labourprice[$i],
            ]);
        }
//        $totalPrice = DB::table('replaced_parts_info')->where('repair_info', $rinfo->id)->sum(DB::raw('partPrice + labourPrice'));
        $rinfo->totalPrice = $this->ReplacedPartsPrice($rinfo->id);
        $rinfo->update();
        return redirect::back()->with('success', 'Ремонтът е добавен успешно.');
    }

    public function ReplacedPartsPrice($id) {
        $ReplacedPartsPrice = DB::table('replaced_parts_info')->where('repair_info', $id)->sum(DB::raw('partPrice + labourPrice'));

        return $ReplacedPartsPrice;
    }
}
