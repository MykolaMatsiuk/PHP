@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити розмір
          </div>
          @include ('layouts.errors')
          @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      {!! Form::open(array('method' => 'post', 'action' => 'Admin\SizeController@store')) !!}
                      {{ csrf_field() }}
                          <div class="form-group">
                              <label for="size">Розмір</label>
                              {{ Form::text('size', null, ['class' => 'form-control', 'id' => 'size']) }}
                          </div>
                          <button type="submit" class="btn btn-default">Створити</button>
                          <a href="/admin/sizes" class="btn btn-warning">Назад</a>
                      {!! Form::close() !!}
                  </div>
                  <!-- /.col-lg-6 (nested) -->
              </div>
              <!-- /.row (nested) -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
@endsection
