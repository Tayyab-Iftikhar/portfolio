<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('frontend.home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/TMS.png') }}" alt="" width="95px" height="40px" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Get Started</span>
                </li>
                @guest
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('frontend.generalHome') }}" aria-expanded="false">
                            <i class="fa-solid fa-house"></i>
                            <span class="hide-menu">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between" href="{{ route('frontend.register.form') }}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-flex">
                                    <i class="ti ti-circle fs-5"></i> </span>
                                <span class="hide-menu">Register</span>
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between" href="{{ route('frontend.login.form') }}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center gap-3">
                                <span class="d-flex">
                                    <i class="ti ti-circle fs-5"></i>
                                </span>
                                <span class="hide-menu">Log In</span>
                            </div>
                        </a>
                    </li>
                @endguest
                @role('Team Lead')
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('frontend.home') }}" aria-expanded="false">
                        <i class="fa-solid fa-house"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="hide-menu">Users</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{route('frontend.showUsers')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">See All Users</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between"
                                href="{{route('frontend.createUser.form')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Create New User</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-computer"></i>
                            </span>
                            <span class="hide-menu">Projects</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{route('frontend.showProjects')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">See All Projects</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between"
                                href="{{route('frontend.createProject.form')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Create New Project</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-list-check"></i>
                            </span>
                            <span class="hide-menu">Tasks</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{route('frontend.showTasks')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">See All Tasks</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between"
                                href="{{route('frontend.createTask.form')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle"></i>
                                    </div>
                                    <span class="hide-menu">Create New Task</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                @role('Developer')
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-list-check"></i>
                            </span>
                            <span class="hide-menu">Assigned Tasks</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between"
                                href="{{route('frontend.showAssignedTasks')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                    <span class="hide-menu">See All Assigned Tasks</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="fa-solid fa-toggle-on fs-6"></i>
                            </span>
                            <span class="hide-menu">Activated Tasks</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{route('frontend.showUsers')}}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-angle-right"></i>
                                    </div>
                                    <span class="hide-menu">See All Activated Tasks</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                @endrole
            </ul>
        </nav>
    </div>
</aside>