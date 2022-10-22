<?php

namespace App\Http\Controllers;

use App\Models\CarMakesModel;
use App\Models\CarModelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CarModelsController extends Controller
{
    public function add_car_model_view(CarMakesModel $car_makes) {
        return view('cars/add_car_model',[
            'car_makes' => $car_makes::all()
        ]);
    }

    public function car_model_info_view(CarModelsModel $car_models, CarMakesModel $car_makes) {
        $car_model_info = $car_models->where('id',$car_models->id)->get()->first();
        $car_makes_info = $car_makes->where('id',$car_models->car_make)->get()->first();
        return view('cars/car_model_info',[
            'car_model_info' => $car_model_info,
            'car_makes' => $car_makes::all(),
            'car_makes_info' => $car_makes_info,
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
            return redirect::back()->with('error', $request->model.' вече съществува.');
        }

        $car_model->name = $request->model;
        $car_model->car_make = $request->make;
        $car_model->save();
        return redirect::back()->with('success', $car_model->name.' е успешно добавен/о към списъка с модели.');
    }

    public function update(Request $request, CarModelsModel $car_models) {
        $this->validate($request,[
            'make' => 'required',
            'model' => 'required',
        ]);

        $car_model = CarModelsModel::find($car_models->id);

        if (DB::table('car_models')->where('name', $request->model)->exists()) {
            return redirect::back()->with('error', $request->model.' вече съществува.');
        }

        $car_model->car_make = $request->make;
        $car_model->name = $request->model;
        $car_model->update();
        return redirect::back()->with('success', $request->model.' е редактиран.');
    }
}
