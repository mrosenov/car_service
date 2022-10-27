<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills">
                {{--HOME--}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">{{__('lang.navbar_home')}}</a>
                </li>
                {{--Workers--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Route::currentRouteNamed(['list_of_workers','add_worker','edit_worker']) ?  'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_workers')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['add_worker']) ?  'active' : ''}}" href="{{route('add_worker')}}">{{__('lang.navbar_add_workers')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['list_of_workers']) ?  'active' : ''}}" href="{{route('list_of_workers')}}">{{__('lang.list_of_workers')}}</a></li>
                    </ul>
                </li>
                {{--Clients--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Route::currentRouteNamed(['clients','client_add','profile']) ?  'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_clients')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['client_add']) ?  'active' : ''}}" href="{{route('client_add')}}">{{__('lang.add_client')}}</a></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['clients']) ?  'active' : ''}}" href="{{route('clients')}}">{{__('lang.list_of_clients')}}</a></li>
                    </ul>
                </li>
                {{--Car Makes & Car Models--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Route::currentRouteNamed(['car_makes_add','car_makes_list','car_model_add']) ?  'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_carmakelist')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['car_makes_add']) ?  'active' : ''}}" href="{{route('car_makes_add')}}">{{__('lang.add_car_make')}}</a></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['car_makes_list']) ?  'active' : ''}}" href="{{route('car_makes_list')}}">{{__('lang.car_makes_list')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['car_model_add']) ?  'active' : ''}}" href="{{route('car_model_add')}}">{{__('lang.add_car_model')}}</a></li>
                    </ul>
                </li>
                {{--Service Types & Service Subtypes--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Route::currentRouteNamed(['service_type_add','service_subtype_add','list_of_services','list_of_service_subtypes','service_type_edit','service_subtype_edit']) ?  'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_services')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['service_type_add']) ?  'active' : ''}}" href="{{route('service_type_add')}}">{{__('lang.navbar_add_service_category')}}</a></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['service_subtype_add']) ?  'active' : ''}}" href="{{route('service_subtype_add')}}">{{__('lang.navbar_add_sub_service')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['list_of_services']) ?  'active' : ''}}" href="{{route('list_of_services')}}">{{__('lang.navbar_services_list')}}</a></li>
                    </ul>
                </li>
                {{--Repairs--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Route::currentRouteNamed(['list_of_repairs']) ?  'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_repairs')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['service_type_add']) ?  'active' : ''}}" href="{{route('service_type_add')}}">{{__('lang.navbar_add_service_category')}}</a></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['service_subtype_add']) ?  'active' : ''}}" href="{{route('service_subtype_add')}}">{{__('lang.navbar_add_sub_service')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item {{Route::currentRouteNamed(['list_of_services']) ?  'active' : ''}}" href="{{route('list_of_repairs')}}">{{__('lang.navbar_list_of_repairs')}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
