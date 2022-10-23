@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.add_service_name')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('service_type_add_form')}}">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-list"></i></span>
                    <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.service_name')}}">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.add_service_name')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
