@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.list_of_clients_cars')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">

            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th colspan="5">{{$client->name}}</th>
                </tr>
                <tr>
                    <th scope="col">{{__('lang.car_make')}}</th>
                    <th scope="col">{{__('lang.car_model')}}</th>
                    <th scope="col">{{__('lang.reg_plat_text')}}</th>
                    <th scope="col">{{__('lang.vin_text')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($carinfo as $car)
                        <tr>
                            <td>{{$car->make['name']}}</td>
                            <td>{{$car->model['name']}}</td>
                            <td>{{$car->reg_plate}}</td>
                            <td>{{$car->vin}}</td>
                            <td>
                                <a href="{{route('edit_client_car',$car->id)}}" class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-light"><i class="fa-duotone fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
