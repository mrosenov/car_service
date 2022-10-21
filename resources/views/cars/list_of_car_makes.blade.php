@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.car_makes_list')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.car_make_name')}}</th>
                    <th scope="col">{{__('lang.car_make_logo')}}</th>
                    <th scope="col" style="width: 15%;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($car_makes as $car_make)
                    <tr>
                        <th scope="row">{{$car_make->id}}</th>
                        <td>{{$car_make->name}}</td>
                        <td>{{$car_make->logo}}</td>
                        <td>
                            <a href="#" class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="/makes/{{$car_make->id}}" class="btn btn-light"><i class="fa-duotone fa-cars"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
