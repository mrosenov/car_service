@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_client')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">
                        <form method="POST" action="{{route('update_client_form',$client_info->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                                <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" value="{{$client_info->name}}" placeholder="{{__('lang.client_name')}}" maxlength="40" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-duotone fa-mobile"></i></span>
                                <input type="text" name="phone" class="form-control @if($errors->any()) is-invalid @endif" value="{{$client_info->phone}}" placeholder="{{__('lang.client_phone')}}" minlength="10" maxlength="11" >
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">{{__('lang.edit_client')}}</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{route('add_client_car_form',$client_info->id)}}">
                            @csrf
                            <div class="input-group mb-3">
                                <select id="car_make" class="form-select @if($errors->any()) is-invalid @endif" name="make">
                                    <option selected disabled>{{__('lang.select_field')}}</option>
                                    @foreach($car_makes as $car_make)
                                        <option value="{{$car_make->id}}">{{$car_make->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <select id="car_model" class="form-select @if($errors->any()) is-invalid @endif" name="model">
                                    <option selected disabled>{{__('lang.select_field')}}</option>
                                    @foreach($car_models as $car_model)
                                        <option value="{{$car_model->id}}" data-type="{{$car_model->car_make}}">{{$car_model->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                                <input type="text" name="regplate" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.reg_plate')}}" minlength="8" maxlength="8" >
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                                <input type="text" name="vin" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.car_vin')}}" minlength="17" maxlength="18" >
                            </div>
                            <script>
                                $(function(){
                                    $("#car_make").on("change", function(){
                                        var $target = $("#car_model").val(""),
                                            car_make = $(this).val();

                                        $target
                                            .toggleClass("hidden", car_make === "")
                                            .find("option:gt(0)").addClass("hidden")
                                            .siblings().filter("[data-type="+car_make+"]").removeClass("hidden");
                                    });
                                });
                            </script>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">{{__('lang.add_car_to_client')}}</button>
                            </div>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection

