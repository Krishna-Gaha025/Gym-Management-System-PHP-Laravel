{{-- Top Navigation Bar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
            aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <form class="d-flex ms-auto my-3 my-lg-0">
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ url('/admin/logout') }}">Logout</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


{{-- Side Navigation Bar --}}
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="{{ url('/admin') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Interface
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
                        <span class="me-2"><i class="fa-solid fa-users"></i></span>
                        <span>Members</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="layouts">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="#" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-user"></i></span>
                                    <span>View</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/member/register') }}"
                                    class="nav-link px-3 @if (url()->current() == url('/admin/member/register')) {{ 'active' }} @endif">
                                    <span class="me-2"><i class="fa-solid fa-user-plus"></i></span>
                                    <span>Register</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ url('/admin/staff') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin/staff')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="fa-sharp fa-solid fa-address-card"></i></span>
                        <span>Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/advertisement') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin/advertisement')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="fa-regular fa-bullhorn"></i></span>
                        <span>Advertisement</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Addons
                    </div>
                </li>
                <li>
                    <a href="{{ url('/admin/store') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin/store')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="fa-solid fa-store"></i></span>
                        <span>Store</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/equipment') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin/equipment')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="fa-solid fa-wrench"></i></span>
                        <span>Equipments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/trash') }}"
                        class="nav-link px-3 @if (url()->current() == url('/admin/trash')) {{ 'active' }} @endif">
                        <span class="me-2"><i class="fa-solid fa-trash"></i></span>
                        <span>Trash Bin</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
