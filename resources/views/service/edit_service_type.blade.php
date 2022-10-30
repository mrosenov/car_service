@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_service_category')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('service_type_edit_form',$service_type->id)}}">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-list"></i></span>
                    <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" value="{{$service_type->name}}" placeholder="{{__('lang.service_name')}}" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.edit_service_category')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
