@php $lang_nav = 'admin/partial/nav.'; @endphp
<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">@lang($lang_nav.'title_uncollapsed')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">@lang($lang_nav.'title_collabsed')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Language dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(app()->getLocale() == 'en') 
                        English 
                        <!-- <img src="{{url('storage/img/english.jpg')}}" class="img-responsive" style="display:inline-block;width:50px;"> -->
                        @else 
                        <!-- <img src="{{URL::asset('storage/img/arabic.png')}}" class="img-responsive" style="display:inline-block;width:50px;"> -->
                        العربية
                        @endif
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu " role="menu">
                        <li>
                            <a href="{{route('switchLang','en')}}" class="nav-link">English 
                                <!-- <img src="{{asset('storage/img/english.jpg')}}" class="img-responsive" style="display:inline-block;width:50px; margin-left: 30px;"> -->
                            </a> 
                        </li>
                        <li>
                            <a href="{{route('switchLang','ar')}}" class="nav-link">العربية
                                <!-- <img src="{{URL::asset('storage/img/arabic.png')}}" class="img-responsive" style="display:inline-block;width:50px; margin-left: 45px;"> -->
                            </a>
                        </li>
                        <!-- <li role="separator" class="divider"></li>
                        <li><a href="#">See More ...</a></li> -->
                    </ul>
                </li>

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">@lang($lang_nav.'messages_num')</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </a>
                                </li><!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../dist/img/user3-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../dist/img/user4-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../dist/img/user3-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="../../dist/img/user4-128x128.jpg" class="img-circle"
                                                 alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">@lang($lang_nav.'all_messages')</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">@lang($lang_nav.'notification_num')</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that
                                        may not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">@lang($lang_nav.'all_notification')</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">@lang($lang_nav.'tasks_num')</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">@lang($lang_nav.'all_tasks')</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                Alexander - Web Developer
                                <small>@lang($lang_nav.'member_since') Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">@lang($lang_nav.'Followers')</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">@lang($lang_nav.'Sales')</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">@lang($lang_nav.'Friends')</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">@lang($lang_nav.'profile')</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-default btn-flat">@lang($lang_nav.'sign-out')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>