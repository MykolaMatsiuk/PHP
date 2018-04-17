@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити елемент меню
          </div>
          @include ('layouts.errors')
          @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      {!! Form::open(array('method' => 'post', 'action' => 'Admin\MenuController@store')) !!}
                      {{ csrf_field() }}
                          <div class="form-group">
                              <label for="item">Заголовок меню</label>
                              {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'item']) }}
                          </div>
                          <button type="submit" class="btn btn-default">Добавити</button>
                          <a href="/admin/menu" class="btn btn-warning">Назад</a>
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
