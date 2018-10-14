@php $lang_nav = 'inc/nav.'; @endphp
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> {{ __($lang_nav.'signin') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang($lang_nav.'signup')</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __($lang_nav.'sign Out') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
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
            </ul>
        </div>
    </div>
</nav>