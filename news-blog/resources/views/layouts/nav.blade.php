<nav class="navbar navbar-light bg-light">
    <div class="container">
        <ul class="navigation">
            @if (App\Navmenu::get()->count())
            @foreach (App\Navmenu::get() as $item)
            <li>
                <a href="#">{{ $item->title }}</a>
                @if ($item->navsubmenu->count())
                <ul class="first-dd">
                    @foreach ($item->navsubmenu as $newspaper)
                    <li>
                        <a href="#">{{ $newspaper->title }}</a>
                        @if ($newspaper->freepaper)
                        <ul class="second-dd">
                            @foreach ($newspaper->freepaper as $paper)
                            <li><a href="">{{ $paper->title }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
            @endif
        </ul>
        <div class="sitename"><h4><a href="/">News Blog</a></h4></div>
        <div id="search"></div>
        <div id="modal"></div>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth                   
                    <a href="#">
                        {{ Auth::user()->name }}
                    </a>

                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     if(confirm('Точно вийти?')) {
                                        document.getElementById('logout-form').submit(); 
                                     } else {
                                        event.preventDefault();
                                     }">
                        Вийти
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Логін</a>
                    <a href="{{ route('register') }}">Реєстрація</a>
                @endauth
            </div> 
        @endif
    </div>
</nav>
