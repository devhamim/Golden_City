@php
    $balance = Calculate::Balance();
    $credit = 0.0;
    $refferal = 0.0;
    $shopping = 0.0;

    // Check if the balance array has the corresponding keys and assign the formatted values
    if (isset($balance['credit']) && is_numeric($balance['credit'])) {
        $credit = $balance['credit'];
    }

    if (isset($balance['refferal']) && is_numeric($balance['refferal'])) {
        $refferal = $balance['refferal'];
    }

    if (isset($balance['shopping']) && is_numeric($balance['shopping'])) {
        $shopping = $balance['shopping'];
    }

    $totalBalance = $credit + $refferal + $shopping;

    use App\Models\StopAllWithdraw;
    $all_withdraw_status = StopAllWithdraw::first();
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            {{-- <a class="nav-link" style="color: #000000e8;font-weight: bold">
                @if (Auth::user()->withdraw == 1 && $all_withdraw_status->status == 'confirm')
                ${{ number_format($totalBalance, 1) }}
                @else
                    <span class="text-danger">Banned</span>
                @endif
            </a> --}}

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-file mr-2"></i> Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
    </ul>
</nav>
