<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.head')
  @section ('script')
  @show
</head>
<body>
  @include('admin.layouts.header')
  <div class="page-content">
    <div class="row">
      <div class="col-md-2">
        @include('admin.layouts.sidebar')
      </div>
      <div class="col-md-10">
        @section('main')
        @show
      </div>
    </div>
  </div>
  @include('admin.layouts.footer')
</body>
</html>
