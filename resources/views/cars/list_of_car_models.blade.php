@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.car_model_list')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.car_model')}}</th>
                    <th scope="col" style="width: 15%;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($car_models as $model)
                    <tr>
                        <th scope="row">{{$model->id}}</th>
                        <td>{{$model->name}}</td>
                        <td>
                            <a href="{{route('car_model_info',$model->id)}}" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
