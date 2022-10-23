@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.list_of_clients_cars')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.service_list_category')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($service_types as $service_type)
                    <tr>
                        <td>{{$service_type->id}}</td>
                        <td>{{$service_type->name}}</td>
                        <td>
                            @if(count($service_type->service_subtype_info) > 0)
                            <a href="{{route('list_of_service_subtypes',$service_type->id)}}" class="btn btn-light"><i class="fa-duotone fa-screwdriver-wrench"></i></a>
                            @endif
                            <a href="#" class="btn btn-light"><i class="fa-duotone fa-pen-to-square"></i></a>
                            <a href="#" class="btn btn-light"><i class="fa-duotone fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
