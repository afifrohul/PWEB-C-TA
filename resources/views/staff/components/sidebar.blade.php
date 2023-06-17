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
            <a class="nav-link @if (Request::segment(2) == 'dashboard') active @endif" href="{{ url('/back-staff/dashboard') }}"  >
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Dashboards</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'patient') active @endif" href="#navbar-patient" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-patient">
            <i class="ni ni-circle-08 text-success"></i>
            <span class="nav-link-text">Pasien</span>
            </a>
            <div class="collapse" id="navbar-patient">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item ">
                <a href="{{ url('/back-staff/patient') }}" class="nav-link ">List Pasien</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-staff/patient/create') }}" class="nav-link">Tambah Pasien</a>
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'type') active @endif" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="ni ni-ungroup text-orange"></i>
            <span class="nav-link-text">Jenis Obat</span>
            </a>
            <div class="collapse" id="navbar-examples">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item ">
                <a href="{{ url('/back-staff/type') }}" class="nav-link ">List Jenis Obat</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-staff/type/create') }}" class="nav-link">Tambah Jenis Obat</a>
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'drug') active @endif" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
            <i class="ni ni-ui-04 text-info"></i>
            <span class="nav-link-text">Obat</span>
            </a>
            <div class="collapse" id="navbar-components">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ url('/back-staff/drug') }}" class="nav-link">List Obat</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-staff/drug/create') }}" class="nav-link">Tambah Obat</a>
                </li>
                <li class="nav-item">
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'drugIn') active @endif" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
            <i class="ni ni-single-copy-04 text-pink"></i>
            <span class="nav-link-text">Pemasukan Obat</span>
            </a>
            <div class="collapse" id="navbar-forms">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ url('/back-staff/drugIn') }}" class="nav-link">List Pemasukan Obat</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-staff/drugIn/create') }}" class="nav-link">Tambah Pemasukan Obat</a>
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'drugOut') active @endif" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
            <i class="ni ni-align-left-2 text-default"></i>
            <span class="nav-link-text">Pengeluaran Obat</span>
            </a>
            <div class="collapse" id="navbar-tables">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ url('/back-staff/drugOut') }}" class="nav-link">List Pengeluaran Obat</a>
                </li>
                <li class="nav-item">
                <a href="{{ url('/back-staff/drugOut/create') }}" class="nav-link">Tambah Pengeluaran Obat</a>
                </li>
            </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'drugList') active @endif" href="#navbar-drugList" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-drugList">
            <i class="ni ni-bullet-list-67 text-default"></i>
            <span class="nav-link-text">Obat Pasien</span>
            </a>
            <div class="collapse" id="navbar-drugList">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ url('/back-staff/drugList') }}" class="nav-link">List Obat Pasien</a>
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