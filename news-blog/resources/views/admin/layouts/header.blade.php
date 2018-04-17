<div class="header">
   <div class="container">
      <div class="row">
         <div class="col-md-10">
            <!-- Logo -->
            <div class="logo">
               <h1><a href="index.html">Admin News Blog</a></h1>
            </div>
         </div>
         <div class="col-md-2">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth                   
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); 
                                         document.getElementById('logout-form').submit();">
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
      </div>
   </div>
</div>
