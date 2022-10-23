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
                    <th scope="col">{{__('lang.sub_service_price')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($service_subtypes as $service_subtype)
                    <tr>
                        <td>{{$service_subtype->id}}</td>
                        <td>{{$service_subtype->name}}</td>
                        <td>{{$service_subtype->price}} лв.</td>
                        <td>
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