@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.add_car_make')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('add_car_make_form')}}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-car-building"></i></span>
                    <input type="text" name="make" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.car_make_name')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-link"></i></span>
                    <input type="text" name="logo" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.car_make_logo')}}">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.add_car_make')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
