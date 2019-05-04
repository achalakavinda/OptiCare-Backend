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

            <li><a href="{{ url('/user') }}"><i class="fa fa-users"></i> <span>User</span></a></li>


            <li><a href="{{ url('/product') }}"><i class="fa fa-users"></i> <span>Product</span></a></li>


            <li><a href="{{ url('/check-up') }}"><i class="fa fa-users"></i> <span>Check Up</span></a></li>




        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
