<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div class="font-weight-bold navbar-brand">
        @role("admin")
            <a href="{{ route("dashboard") }}">{{ config("app.name") }}</a>
        @else
            <a href="#">{{ config("app.name") }}</a>
        @endrole
    </div>
    <span><i class="fa fa-chevron-right text-dark mr-2"></i></span>
    @foreach ($headers as $header)
        <div class="font-weight-bold navbar-brand @if ($loop->last && !$loop->first) text-black-50 @endif">

            @if (!$loop->last)
                <a href="{{ $header["link"] }}">{{ $header["label"] ?? "Dashboard" }}</a>
            @else
                {{ $header ?? "Dashboard" }}
            @endif
        </div>
        @if (!$loop->last)
            <span><i class="fa fa-chevron-right text-dark mr-2"></i></span>
        @endif
    @endforeach


    <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()?->getFullname() }} </span>
                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route("me") }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
