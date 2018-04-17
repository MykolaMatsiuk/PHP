@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити елемент підменю
          </div>
          @include ('layouts.errors')
          @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      {!! Form::open(array('method' => 'post', 'action' => 'Admin\SubmenuController@store')) !!}
                      {{ csrf_field() }}
                          <div class="form-group">
                              <label for="item">Заголовок підменю</label>
                              {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'item']) }}
                          </div>
                          <div class="form-group">
                              <label for="parent_item">Відповідний елемент меню</label>
                              {{ Form::select('parent_item', $parentItems, null, ['class' => 'form-control', 'id' => 'parent_item']) }}
                          </div>
                          <button type="submit" class="btn btn-default">Добавити</button>
                          <a href="/admin/submenu" class="btn btn-warning">Назад</a>
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
