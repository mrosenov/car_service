@extends('layouts.default')

@section('section')
    <div class="card border-secondary mb-3">
        <div class="card-header">{{__('lang.list_of_workers')}}</div>
        <div class="card-body text-secondary">
            <p class="card-text">
            <table class="table table-bordered table-striped table-hover" style="text-align: center; vertical-align: middle">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{__('lang.service_list_category')}}</th>
                    <th scope="col">{{__('lang.added_at_text')}}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($workers as $worker)
                <tr>
                    <td>{{$worker->id}}</td>
                    <td>{{$worker->name}}</td>
                    <td>{{$worker->created_at}}</td>
                    <td>
                        <a href="{{route('edit_worker', $worker->id)}}" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-pen-to-square"></i></a>
                        <a href="{{route('delete_worker', $worker->id)}}" class="btn btn-light btn-outline-secondary"><i class="fa-duotone fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
