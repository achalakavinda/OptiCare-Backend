<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left">
                <img style="width: 70%" src="{!! asset('img/logo.png') !!}">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">System</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="{{ url('/') }}"><i class="fa fa-user"></i> <span>Users</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/user') }}"> <span>Admins</span></a></li>

                    <li><a href="{{ url('/optician') }}"> <span>Opticians</span></a></li>

                    <li><a href="{{ url('/patient') }}"> <span>Patient</span></a></li>
                </ul>
            </li>

            <li><a href="{{ url('/product') }}"><i class="fa fa-square"></i> <span>Product</span></a></li>

            <li><a href="{{ url('/vision') }}"><i class="fa ion-ios-medical"></i> <span>Vision</span></a></li>

            <li><a href="{{ url('/check-up') }}"><i class="fa fa-calendar"></i> <span>Check Up</span></a></li>

            <li style="padding-bottom: 50px;" class="treeview">
                <a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> <span>Settings</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/settings') }}"><i class="fa fa-cogs"></i> Settings</a></li>


                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i> <span>Access Control</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/settings/access-control/permissions') }}"><i class="fa fa-universal-access"></i>Permission</a></li>
                            <li><a href="{{ url('/settings/access-control/roles') }}"><i class="fa fa-level-up"></i>Roles</a></li>
                            <li><a href="{{ url('/settings/access-control/user-management') }}"><i class="fa fa-users"></i>User Management</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
