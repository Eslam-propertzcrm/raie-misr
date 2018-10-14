@php $lang_right_side = 'admin/partial/right-sideMenu.'; @endphp

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander</p>
                <a href="#"><i class="fa fa-circle text-success"></i> @lang($lang_right_side.'online')</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="@lang($lang_right_side.'search')">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>@lang($lang_right_side.'dashboard')</span> <i
                            class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> @lang($lang_right_side.'dashboard_v1') </a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> @lang($lang_right_side.'dashboard_v2') </a></li>
                </ul>
            </li>


            <li><a href="#"><i class="fa fa-book"></i> <span>@lang($lang_right_side.'documentation')</span></a>
            </li>
            <li class="header">@lang($lang_right_side.'labels')</li>

            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>@lang($lang_right_side.'information')</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>