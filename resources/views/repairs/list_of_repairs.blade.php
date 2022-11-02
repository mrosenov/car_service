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
                    <th scope="col">{{__('lang.parts_table_partnum_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_partname_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_partprice_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_service_text')}}</th>
                    <th scope="col">{{__('lang.parts_table_labour_text')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($replaced_parts as $part)
                        <tr>
                            <td>{{$part->id}}</td>
                            <td>{{$part->RepairInfo->CarInfo->reg_plate}} - {{$part->RepairInfo->CarInfo->vin}}</td>
                            <td>{{$part->RepairInfo->WorkerInfo->name}}</td>
                            <td>{{$part->partNumber}}</td>
                            <td>{{$part->partName}}</td>
                            <td>{{$part->partPrice}} ЛВ</td>
                            <td>{{$part->ServiceType->name}}</td>
                            <td>{{$part->labourPrice}} ЛВ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
