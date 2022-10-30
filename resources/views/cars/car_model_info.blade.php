@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_car_model')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('update_car_model_form',$car_model_info->id)}}">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <select class="form-select @if($errors->any()) is-invalid @endif" name="make" required>
                        <option selected disabled>{{__('lang.select_field')}}</option>
                        @foreach($car_makes as $car_make)
                        <option value="{{$car_make->id}}" @if($car_makes_info->id == $car_make->id) selected @endif>{{$car_make->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-car"></i></span>
                    <input type="text" name="model" class="form-control @if($errors->any()) is-invalid @endif" value="{{$car_model_info->name}}" placeholder="{{__('lang.car_model')}}" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.edit_car_model')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
