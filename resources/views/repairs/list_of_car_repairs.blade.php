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
                            <a href="{{route('view_repair', $repair->id)}}" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-clipboard-list"></i></a>
                            <a href="{{route('car_repair_delete', $repair->id)}}" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">
                        <strong>{{__('lang.all_repairs_price')}} {{$AllCarRepairsPrice}} лв</strong>
                    </td>
                </tr>
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
