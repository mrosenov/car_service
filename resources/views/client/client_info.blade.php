@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_client')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
                <form method="POST" action="">
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                        <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" value="{{$client_info->name}}" placeholder="{{__('lang.client_name')}}" maxlength="40" >
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-duotone fa-mobile"></i></span>
                        <input type="text" name="phone" class="form-control @if($errors->any()) is-invalid @endif" value="{{$client_info->phone}}" placeholder="{{__('lang.client_phone')}}" maxlength="11" >
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">{{__('lang.edit_client')}}</button>
                    </div>
                </form>
            </p>
        </div>
    </div>
@endsection
