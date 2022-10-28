@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.navbar_add_repair')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('add_repair_form')}}">
                @csrf
                <div class="input-group mb-3">
                    <select class="form-select select_carInfo @if($errors->any()) is-invalid @endif" name="repairedcar">
                        <option selected disabled>{{__('lang.repaired_car')}}</option>
                        @foreach($car_info as $car)
                            <option value="{{$car->id}}">{{$car->reg_plate}} - {{$car->vin}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select class="form-select select_carWorker @if($errors->any()) is-invalid @endif" name="worker">
                        <option selected disabled>{{__('lang.car_worker_text')}}</option>
                        @foreach($workers as $worker)
                            <option value="{{$worker->id}}">{{$worker->name}}</option>
                        @endforeach
                    </select>
                </div>

                <table id="partsTable" class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <td style="text-align: center; font-weight: bold">
                            {{__('lang.parts_table_number')}}
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            {{__('lang.parts_table_name')}}
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            {{__('lang.parts_table_part_price')}}
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            {{__('lang.parts_table_service_type')}}
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            {{__('lang.parts_table_labour_price')}}
                        </td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input name="partnumber[]" type="text" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.parts_table_number')}}">
                            </td>
                            <td>
                                <input name="partname[]" type="text" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.parts_table_name')}}">
                            </td>
                            <td>
                                <input name="partprice[]" type="number" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.parts_table_part_price')}}" min="0" step="0.1">
                            </td>
                            <td>
                                <select name="servicetype[]" class="form-select @if($errors->any()) is-invalid @endif">
                                    <option>{{__('lang.parts_table_service_type')}}</option>
                                    @foreach($service_types as $type)
                                        <optgroup label="{{$type->name}}">
                                            @foreach($service_subtypes as $subtype)
                                                @if($subtype->service_type_info->id == $type->id)
                                                    <option value="{{$subtype->id}}">{{$subtype->name}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input name="labourprice[]" type="number" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.parts_table_labour_price')}}" min="0" step="0.1">
                            </td>
                            <td style="text-align: center; width: 10%">
                                <button type="button" class="btn btn-light btn-outline-success" onclick="addRow(this)"><i class="fa-duotone fa-square-plus"></i></button>
                                <button type="button" class="btn btn-light btn-outline-danger btnDelete"><i class="fa-duotone fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    function addRow(row) {
                        var i = row.parentNode.parentNode.rowIndex;
                        var tr = document.getElementById('partsTable').insertRow(i + 1);
                        tr.innerHTML = row.parentNode.parentNode.innerHTML;
                        var inputs = tr.querySelectorAll("input[type='text']");
                        for (var i = 0; i < inputs.length; i++)
                            inputs[i].value = "";
                    }

                    $("#partsTable").on('click', '.btnDelete', function () {
                        $(this).closest('tr').remove();
                    });
                </script>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.navbar_add_repair')}}</button>
                </div>
            </form>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".select_carInfo").select2();
                    $(".select_carWorker").select2();
                });
            </script>
            </p>
        </div>
    </div>
@endsection
