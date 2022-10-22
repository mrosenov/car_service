@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_car_make')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('update_car_make_form',$car_make_info->id)}}">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-car-building"></i></span>
                    <input type="text" name="make" class="form-control @if($errors->any()) is-invalid @endif" value="{{$car_make_info->name}}" placeholder="{{__('lang.car_make_name')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-link"></i></span>
                    <input type="text" name="logo" class="form-control @if($errors->any()) is-invalid @endif" value="{{$car_make_info->logo}}" placeholder="{{__('lang.car_make_logo')}}">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.edit_car_make')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
