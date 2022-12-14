@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.edit_worker')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <form method="POST" action="{{route('edit_worker_form', $worker->id)}}">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-user-helmet-safety"></i></span>
                    <input type="text" name="name" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.name_text')}}" value="{{$worker->name}}" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-duotone fa-mobile"></i></span>
                    <input type="text" name="phone" class="form-control @if($errors->any()) is-invalid @endif" placeholder="{{__('lang.phone_text')}}" maxlength="10" value="{{$worker->phone}}" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">{{__('lang.edit_worker')}}</button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection
