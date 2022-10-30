@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.list_of_replaced_parts')}} <strong>{{$repair_info->CarInfo->make->name}} {{$repair_info->CarInfo->model->name}} - {{$repair_info->CarInfo->reg_plate}}</strong></div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.parts_table_partnum_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_partname_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_partprice_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_service_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_labour_text')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($replaced_parts as $part)
                    <tr>
                        <td>{{$part->id}}</td>
                        <td>{{$part->partNumber}}</td>
                        <td>{{$part->partName}}</td>
                        <td>{{$part->partPrice}} ЛВ</td>
                        <td>{{$part->ServiceType->name}}</td>
                        <td>{{$part->labourPrice}} ЛВ</td>
                        <td>
                            <a href="" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="7">
                        <strong>{{__('lang.repair_price')}} {{$repair_info->totalPrice}} лв</strong>
                    </td>
                </tr>
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
