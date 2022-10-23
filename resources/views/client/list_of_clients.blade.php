@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.add_client')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
                <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('lang.client_name')}}</th>
                        <th scope="col">{{__('lang.client_phone')}}</th>
                        <th scope="col" style="width: 15%;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{$client->id}}</th>
                        <td>{{$client->name}}</td>
                        <td>{{$client->phone}}</td>
                        <td>
                            <a href="{{route('profile',$client->id)}}" class="btn btn-light"><i class="fa-duotone fa-user-pen"></i></a>
                            @if($client->cars)
                                <a href="{{route('client_cars',$client->id)}}" class="btn btn-light"><i class="fa-duotone fa-car-garage"></i></a>
                            @endif
                            <a href="{{route('delete_client',$client->id)}}" class="btn btn-light"><i class="fa-duotone fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
@endsection
