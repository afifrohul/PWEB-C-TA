<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
<div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('assets/img/Logo.png') }}" class="navbar-brand-img" alt="...">
    </a>
    <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
        </div>
        </div>
    </div>
    </div>
    <div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'dashboard') active @endif" href="{{ url('/back-doctor/dashboard') }}"  >
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Dashboards</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'diagnosis') active @endif" href="#navbar-diagnosis" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-diagnosis">
            <i class="ni ni-sound-wave text-danger"></i>
            <span class="nav-link-text">Diagnosis</span>
            </a>
            <div class="collapse" id="navbar-diagnosis">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item ">
                <a href="{{ url('/back-doctor/diagnosis') }}" class="nav-link ">List Diagnosis</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-doctor/diagnosis/create') }}" class="nav-link">Tambah Diagnosis</a>
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'inspection') active @endif" href="#navbar-inspection" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-inspection">
            <i class="ni ni-single-02 text-success"></i>
            <span class="nav-link-text">Pemeriksaan</span>
            </a>
            <div class="collapse" id="navbar-inspection">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item ">
                <a href="{{ url('/back-doctor/inspection') }}" class="nav-link ">Riwayat Pemeriksaan</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-doctor/inspection/create') }}" class="nav-link">Tambah Pemeriksaan</a>
                </li>
            </ul>
            </div>
        </li>

        </ul>
        <!-- Divider -->
    </div>
    </div>
</div>
</nav>