<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <!--logo-->
        <div class="logo">
            <a href="index.html">
                <img src="assets/img/logo-dark.png"alt="" class="logo-dark">
                <img src="assets/img/logo-white.png" alt="" class="logo-white">
            </a>
        </div><!--/-->

        <!--navbar-collapse-->
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ml-auto mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}"> Home </a>
                </li>


                @if (Auth::check())
                <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"> Dashboard </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="{{ route('profile.edit') }}"> Profile </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" nclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Logout </a>

                   </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"> Register </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Login </a>
                    </li>
                @endif





            </ul>
        </div><!--/-->

        <!--navbar-right-->
        <div class="navbar-right ml-auto">
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox" />
                    <div class="slider round"></div>
                </label>
            </div>

            <div class="social-icones">
                <ul class="list-inline">

                    @if (Auth::guest())

                    @else

                        <a href="#">{{ Auth::user()->name }} </a>
                    @endif

                    <li>

                    </li>
                </ul>
            </div>

            <div class="search-icon">
                <i class="icon_search"></i>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
