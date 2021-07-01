<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <h1>
                    <a href="/" title="Үндэсний статик хороо"
                      ><img src="{{asset('frontend/img/logo.png')}}"/></a>
                  </h1>
            </div>
            <nav class="col-lg-9 col-6">
                <ul id="top_access">
                    @auth
                    @if(Auth::user()->role=='admin')
                    <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Админ</a></li>
                     @else
                    <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Хэрэглэгч</a></li>
                     @endif
                    <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">Гарах</a></li>
                     @else
                    <li><a href="{{route('login.form')}}"><i class="pe-7s-user"></i></a></li>
                    <li><a href="{{route('register.form')}}"><i class="pe-7s-add-user"></i></a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->
<!-- /container -->
