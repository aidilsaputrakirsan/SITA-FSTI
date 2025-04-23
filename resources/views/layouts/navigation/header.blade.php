<header id="page-topbar" class="animated-header">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/logo-si.png') }}" alt="" height="28" class="logo-animation">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/logo-si.png') }}" alt="" height="28" class="logo-animation"> 
                        <span class="logo-txt">
                            <img src="{{ asset('assets/img/logo-sitasi.png') }}" alt="" height="28" class="logo-animation">
                        </span>
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/logo-si.png') }}" alt="" height="28" class="logo-animation">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/logo-si.png') }}" alt="" height="28" class="logo-animation"> 
                        <span class="logo-txt">
                            <img src="{{ asset('assets/img/logo-sitasi.png') }}" alt="" height="28" class="logo-animation">
                        </span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect menu-toggle-btn" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            
            <!-- Breadcrumb -->
            <div class="header-breadcrumb d-none d-md-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ str_replace('-', ' ', Request::segment(1)) }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex">
            <!-- Full Screen Button -->
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen" id="fullscreen-button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </button>
            </div>

            <!-- Notifications -->
            @livewire('notification')
            
            <!-- User Profile -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('dist/assets/images/users/avatar.png')}}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end animated fadeInDown profile-dropdown">
                    <!-- Profile -->
                    <a class="dropdown-item" href="{{ route('user-profile:index') }}">
                        <i class="fas fa-user text-primary font-size-16 align-middle me-1"></i> 
                        <span>Profile</span>
                    </a>
                    
                    <!-- Divider -->
                    <div class="dropdown-divider"></div>
                    
                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">
                            <i class="fas fa-sign-out-alt font-size-16 align-middle me-1"></i> 
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>