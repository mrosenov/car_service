<?php

namespace App\Http\Controllers;

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarModelsController extends Controller
{
    public function add_car_model_view(CarMakesModel $car_makes) {
        return view('cars/add_car_model',[
            'car_makes' => $car_makes::all()
        ]);
    }

    public function store(Request $request) {
        $this->validate($request,[
            'make' => 'required',
            'model' => 'required',
        ]);

        $car_model = new CarModelsModel();

        //check if car make exists if so return error
        if (DB::table('car_models')->where('name', $request->model)->where('car_make', $request->make)->exists()) {
            return redirect('models/add')->with('error', $request->model.' вече съществува.');
        }

        $car_model->name = $request->model;
        $car_model->car_make = $request->make;
        $car_model->save();
        return redirect('models/add')->with('success', $car_model->name.' е успешно добавен/о към списъка с модели.');
    }
}
