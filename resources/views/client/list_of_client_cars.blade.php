@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.list_of_clients_cars')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">

            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th colspan="3">{{$client->name}}</th>
                </tr>
                <tr>
                    <th scope="col">{{__('lang.car_make')}}</th>
                    <th scope="col">{{__('lang.car_model')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($carinfo as $car)
                        <tr>
                            <td>{{$car->make['name']}}</td>
                            <td>{{$car->model['name']}}</td>
                            <td>
                                <a href="#" class="btn btn-primary">s</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
