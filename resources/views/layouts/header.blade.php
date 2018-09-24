<nav id="mainNav" class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="navbar_dropdown" class="nav-link dropdown-toggle" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        href="#">HOME</a>
                    <div class="dropdown-menu" aria-labelledby="navbar_dropdown">
                        <a class="dropdown-item" href="{{ route('events.index') }}">イベント一覧</a>
                        <a class="dropdown-item" href="{{ route('home.about') }}">WaZとは</a>
                        <a class="dropdown-item" href="{{ route('home.guideline') }}">ガイドライン</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="user-font">{{ Auth::user()->name }}</span> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', ['user' => Auth::user()]) }}">プロフィール</a>

                            <!-- Logout form -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

