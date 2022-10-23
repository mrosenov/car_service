@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.add_sub_service')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('service_subtype_add_form')}}">
                @csrf

                <div class="input-group mb-3">
                    <select class="form-select @if($errors->any()) is-invalid @endif" name="servicetype">
                        <option selected disabled>{{__('lang.select_field')}}</option>
                        @foreach($service_types as $service_type)
                            <option value="{{$service_type->id}}">{{$service_type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-screwdriver-wrench"></i></span>
                    <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.sub_service_name')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-sack-dollar"></i></span>
                    <input type="number" name="price" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.sub_service_price')}}" min="0" step="0.1">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.add_sub_service')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
