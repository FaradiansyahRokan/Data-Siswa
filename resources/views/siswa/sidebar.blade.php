<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon ">
        <img src="../img/idn.png" alt="">
      </div>
      <div class="sidebar-brand-text mx-3">Data IDN</div>
    </a>
  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('siswa') }}">
        <i class='fas fa-school'></i>
        <span>Home</span></a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="{{ url('siswa/create') }}">
        <i class='fas fa-chalkboard-teacher'></i>
        <span>Tambah Siswa</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <div class="container">
      {{-- //kalau udah login dan sudah diberanda, maka button login dan signup hilang --}}
      @if (!Auth::check())
                        {{-- <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ url('register') }}" class="btn btn-warning">Register</a> --}}
                    @else
                          <li>
                              <a class="btn btn-outline-success" href="{{ url('logout') }}">Logout</a>
                          </li>
                    @endif
  </div>

  </ul>
  