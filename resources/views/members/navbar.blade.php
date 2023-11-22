<nav class="navbar navbar-expand-lg bg-body-tertiary text-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/home')}}">FitnessZone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/home/epay')}}">Get Membership</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                @php
                    $fullname = Session::get('member_name');
                    $name = strtok($fullname, " ")
                @endphp
                <a class="nav-link dropdown-toggle ms-2 text-dark" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Welcome {{$name}}
                    <img src="/images/user.png" alt="" height="30" width="30">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{url('/home/profile')}}/{{Session::get('member_id')}}">View Profile</a></li>
                  <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>