@extends('layouts.default')

@section('section')
<div class="card border-secondary mb-3">
    <div class="card-header">{{__('lang.add_client')}}</div>
    <div class="card-body text-secondary">
        <p class="card-text">
            <form method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-input-text"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('lang.client_name')}}">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-mobile"></i></span>
                    <input type="text" class="form-control" placeholder="{{__('lang.client_phone')}}">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.add_client')}}</button>
                </div>
            </form>
        </p>
    </div>
</div>
@endsection
