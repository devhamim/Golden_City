<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Golden City</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#"
                    class="d-block">{{ Auth::check() ? Auth::user()->fName . ' ' . Auth::user()->lName : '' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-header bg-secondary">ADMIN</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Member
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.member') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('member.packge.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Member Packge List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('banned.member') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banned Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('member.account.verified') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Member Verified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('member.bonus') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Member Bonus</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Deposit
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.deposit') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deposit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('deposite.request') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deposit Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('deposite.reject') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reject Deposit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Withdraw
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.request') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.commission') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Commission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.withdraw.reject') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Reject</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('stop.withdraw') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stop Withdraw Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('stop.all.withdraw') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stop All Withdraw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('withdraw.vat.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Vat Set</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            News
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('news.promotion') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>News Promotion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('update.news') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Update News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('fake.news') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fake News</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            All Set List
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('daily.bonus.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daily Bonus Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reference.bonus.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reference Bonus Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('generation.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generation Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('withdraw.vat.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw Vat Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transfer.vat.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transfer Vat Set</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('matching.bonus.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Matching Bonus Set</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Bonus Set
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bonus.set') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bonus Set</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tree
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tree.hide.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tree Hide/Show</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Access
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.tree.access') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Tree Access</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.bkash.access') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Bkash Access</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('account.setting') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Account Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('password.change') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header bg-secondary">USER</li>
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Dashboard
                            <span class="badge badge-info right">User</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Deposit
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.deposit') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deposit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Withdraw
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.withdraw') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Withdraw</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Package
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.package.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Packacge</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('active.package') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Active Package</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Balance
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Balance Transfer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- <a href="{{ route('user.info') }}" class="nav-link"> --}}
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Personal Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('account.verified') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Account Verified</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('upgrade.account') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Upgrade Account</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('pin.code') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pin Code</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('password.change') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Change Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('user.profile') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('edit.user.profile') }}" class="nav-link"> --}}
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
