@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.navbar_list_of_repairs')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.parts_table_car_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_worker_text')}}</th>
                    <th scope="col">{{__('lang.list_repairs_totalprice_text')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($list_repairs as $repair)
                    <tr>
                        <td>{{$repair->id}}</td>
                        <td>{{$repair->CarInfo->reg_plate}} - {{$repair->CarInfo->vin}}</td>
                        <td>{{$repair->WorkerInfo->name}}</td>

                        <td>
                           {{$repair->totalPrice}} ЛВ
                        </td>
                        <td>
                            <a href="" class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="" class="btn btn-light"><i class="fa-duotone fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection