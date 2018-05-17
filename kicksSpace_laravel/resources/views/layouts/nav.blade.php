<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">

    <span class="title-main"><a href="/"><span class="main-title">KicksSpace</span></a></span>

    <div class="right-sec">
      <div class="login">
        @guest
        <a class="nav-link dropdown-toggle drop-log" href="#" id="logoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Увійти</a>
        <ul class="dropdown-menu dropdown-login" aria-labelledby="logoDropdown">
          <form action="{{ route('login') }}" method="POST" class="form-login">
            {{ csrf_field() }}
            <li>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" class="form-control" name="email" type="email">
                @if (isset($errors) && ($errors->has('email')))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </li>
            <li>
              <div class="form-group">
                <label for="password">Пароль</label>
                <input id="password" class="form-control" name="password" type="password">
                @if (isset($errors) && ($errors->has('password')))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </li>
            <li>
                <input class="btn btn-block btn-primary" type="submit" value="Увійти">
            </li>
<!--             <li>
              <div class="form-group text-right">
                <small><a href="{{ route('password.request') }}">Забули пароль?</a></small>
              </div>
            </li> -->
          </form>
        </ul>
        <a class="reg" href="{{ route('register') }}">/ Реєстрація</a>
        @else
          <a href="/orders" class="auth">
            {{ Auth::user()->name }}
          </a>

              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                &nbsp;/&nbsp;Вийти
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>

        @endguest
      </div>
    </div>
  </div>
</nav>
 
