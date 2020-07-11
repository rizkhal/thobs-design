<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{is_active('home*')}}" href="{{ route('admin.index') }}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{is_active(['category*'])}}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-rocket"></i>Data Master</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ is_active('category*') }}" href="{{ route('admin.category.index') }}">Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{is_active(['appointments*', 'projects*'])}}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-inbox"></i>App</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ is_active('projects*') }}" href="{{ route('admin.projects.index') }}">All Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ is_active('appointments*') }}" href="{{ route('admin.appointment.index') }}">Appointments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Features
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{is_active('subscribers*')}}" href="{{ route('admin.subscriber.index') }}"><i class="fas fa-circle"></i>Subscriber</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>