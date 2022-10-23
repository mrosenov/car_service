<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">{{__('lang.navbar_home')}}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_clients')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('client_add')}}">{{__('lang.add_client')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('clients')}}">{{__('lang.list_of_clients')}}</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_carmakelist')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('car_makes_add')}}">{{__('lang.add_car_make')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('car_makes_list')}}">{{__('lang.car_makes_list')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('car_model_add')}}">{{__('lang.add_car_model')}}</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('lang.navbar_services')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('service_type_add')}}">{{__('lang.navbar_add_service_category')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('service_subtype_add')}}">{{__('lang.navbar_add_sub_service')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('list_of_services')}}">{{__('lang.navbar_services_list')}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
