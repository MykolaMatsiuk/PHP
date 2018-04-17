@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити теги
          </div>
          @include ('layouts.errors')
          @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      {!! Form::open(array('method' => 'post', 'action' => 'Admin\TagController@store')) !!}
                      {{ csrf_field() }}
                          <div class="form-group">
                              <label for="tag">Заголовок тега</label>
                              {{ Form::text('tag', null, ['class' => 'form-control', 'id' => 'tag']) }}
                          </div>
                          <button type="submit" class="btn btn-default">Відправити</button>
                          <a href="/admin/tags" class="btn btn-warning">Назад</a>
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
