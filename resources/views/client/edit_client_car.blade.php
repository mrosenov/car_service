@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_car_of_client')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('update_client_car_form',$carinfo->id)}}">
                @csrf
                @method('PATCH')
                <label class="form-label" style="width: 100%;">
                    <span>{{__('lang.current_car_owner')}}</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-duotone fa-user"></i></span>
                        <input type="text" class="form-control @if($errors->any()) is-invalid @endif" value="{{$client->name}} - {{$client->phone}}" disabled>
                    </div>
                </label>

                <div class="input-group mb-3">
                    <label style="width: 100%;">
                        <span>{{__('lang.change_car_owner')}}</span>
                        <select class="form-select @if($errors->any()) is-invalid @endif" name="newowner">
                            <option selected disabled>{{__('lang.select_field')}}</option>
                            @foreach($clients as $owner)
                                <option value="{{$owner->id}}" @if($client->id == $owner->id) selected @endif>{{$owner->name}} - {{$owner->phone}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="input-group mb-3">
                    <select id="car_make" class="form-select @if($errors->any()) is-invalid @endif" name="make">
                        <option selected disabled>{{__('lang.select_field')}}</option>
                        @foreach($car_makes as $car_make)
                            <option value="{{$car_make->id}}" @if($carinfo->car_make == $car_make->id) selected @endif>{{$car_make->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select id="car_model" class="form-select @if($errors->any()) is-invalid @endif" name="model">
                        <option selected disabled>{{__('lang.select_field')}}</option>
                        @foreach($car_models as $car_model)
                            <option value="{{$car_model->id}}" data-type="{{$car_model->car_make}}" @if($carinfo->car_model == $car_model->id) selected @endif>{{$car_model->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                    <input type="text" name="regplate" class="form-control @if($errors->any()) is-invalid @endif" value="{{$carinfo->reg_plate}}" placeholder="{{__('lang.car_make_name')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                    <input type="text" name="vin" class="form-control @if($errors->any()) is-invalid @endif" value="{{$carinfo->vin}}" placeholder="{{__('lang.car_make_logo')}}">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.edit_car_of_client')}}</button>
                </div>
            </form>
            <script>
                $(function () {
                    $("#car_make").on("change", function () {
                        var $target = $("#car_model").val(""),
                            car_make = $(this).val();

                        $target
                            .toggleClass("hidden", car_make === "")
                            .find("option:gt(0)").addClass("hidden")
                            .siblings().filter("[data-type=" + car_make + "]").removeClass("hidden");
                    });
                });
            </script>
            </p>
        </div>
    </div>
@endsection
