<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Staff Area | HealHub</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/logo_nobg.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css') }}" type="text/css">
  
</head>

<body>
  <!-- Sidebar -->
  @include('staff.components.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- navbar -->
    @include('staff.components.navbar')
    <div class="header bg-primary pb-6">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      
      @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          @yield('card')
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')
    </div>
  </div>
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
  <script src="{{ asset('assets/js/argon.js') }}"></script>

  @yield('extraJS')
</body>

</html>