<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      {{-- <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center"> --}}
        <span class="d-none d-lg-block">Doctory</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
              {{-- <form method="POST" action="{{ route('logout') }}"> --}}
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center">
                  <i class="bi bi-box-arrow-right"></i>
                  
                  <a href="{{  route('logout')}}"><span>Sign Out</span></a>
                </button>
              </form>
            </li>
          </ul>
    </nav>
  </header>

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Home Page -->
    {{-- <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Home Page</span>
      </a>
    </li> --}}

    <!-- Doctors -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}" href="{{ route('admin.doctors.index') }}">
        <i class="bi bi-heart-pulse"></i>
        <span>Doctors</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.pharmacies.*') ? 'active' : '' }}" href="{{ route('Pharmacies') }}">
        <i class="bi bi-prescription"></i>
        <span>Pharmacies</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('offers.*') ? 'active' : '' }}" href="{{ route('offers.index') }}">
        <i class="bi bi-bag-heart"></i>
        <span>offers</span>
      </a>
    </li>

    
      <a class="nav-link {{ request()->routeIs('reservation.*') ? 'active' : '' }}" href="{{ route('reservation.index') }}">
        <i class="bi bi-calendar2-date"></i>
        <span>reservations</span>
      </a>
    </li>


    <a class="nav-link {{ request()->routeIs('city.*') ? 'active' : '' }}" href="{{ route('city.index') }}">
      <i class="bi bi-hospital"></i>
      <span>cities</span>
    </a>
  </li>



  <a class="nav-link {{ request()->routeIs('Specialties.*') ? 'active' : '' }}" href="{{ route('Specialties.index') }}">
    <i class="bi bi-grid-3x3-gap"></i>
    <span>Specialties</span>
  </a>
</li>

  <a class="nav-link {{ request()->routeIs('problem.*') ? 'active' : '' }}" href="{{ route('problem.index') }}">
    <i class="bi bi-bandaid"></i>
    <span>problems</span>
  </a>
</li>


    {{-- <!-- Pharmacies -->

    <!-- Offers -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.offers.*') ? 'active' : '' }}" href="{{ route('admin.offers.index') }}">
        <i class="bi bi-tags"></i>
        <span>Offers</span>
      </a>
    </li>

    <!-- Reservations Dropdown -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#reservations-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar"></i><span>Reservations</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="reservations-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <!-- Reservations by Offers -->
        <li>
          <a href="{{ route('admin.reservations.offers') }}" class="{{ request()->routeIs('admin.reservations.offers') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Offers</span>
          </a>
        </li>
        <!-- Reservations by Doctors -->
        <li>
          <a href="{{ route('admin.reservations.index') }}" class="{{ request()->routeIs('admin.reservations.index') ? 'active' : '' }}">
            <i class="bi bi-circle"></i><span>Doctors</span>
          </a>
        </li> --}}
      {{-- </ul>
    </li> --}}

  </ul>

</aside>
<!-- End Sidebar-->

  <main id="main" class="main">
    @yield('main')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="credits">
      Designed by <a href="https://www.facebook.com/profile.php?id=100008229483826&mibextid=ZbWKwL">Mar3y</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>