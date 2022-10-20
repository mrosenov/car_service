<?php

namespace App\Http\Controllers;

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarMakesController extends Controller
{
    public function add_car_make_view() {
        return view('cars/add_car_make');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'make' => 'required',
        ]);

        $car_make = new CarMakesModel();

        //check if car make exists if so return error
        if (DB::table('car_makes')->where('name', $request->make)->exists()) {
            return redirect('makes_add')->with('error', $request->make.' вече съществува.');
        }

        $car_make->name = $request->make;
        $car_make->logo = $request->logo;
        $car_make->save();
        return redirect('makes_add')->with('success', $car_make->name.' е успешно добавен/о към списъка с производители');
    }
}
