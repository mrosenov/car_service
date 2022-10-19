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
                        <li><a class="dropdown-item" href="/clients/add">{{__('lang.add_client')}}</a></li>
                        <li><a class="dropdown-item" href="/clients">{{__('lang.list_of_clients')}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
