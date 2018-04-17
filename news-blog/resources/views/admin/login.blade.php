<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ asset('admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">

  </head>
  <body class="login-bg">
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="/">News Blog Admin</a></h1>
                </div>
             </div>
          </div>
       </div>
  </div>

  <div class="page-content container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-wrapper">
          @include('layouts.errors')
            <form action="{{ route('admin.login') }}" method="post">
              {{ csrf_field() }}
              <div class="box">
                  <div class="content-wrap">
                      <h6>Логін</h6>
                      <input class="form-control" name="email" type="text" placeholder="E-mail address">
                      <input class="form-control" name="password" type="password" placeholder="Password">
                      <div class="action">
                          <button class="btn btn-primary signup" type="submit">Логін</button>
                      </div>                
                  </div>
              </div>

            </form>
          </div>
      </div>
    </div>
  </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
  </body>
</html>
