@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Редагування елемента меню
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form action="{{ route('menu.update', $item->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                          <div class="form-group">
                              <label for="item">Заголовок</label>
                              <input type="text" name="title" value="{{ $item->title }}" class="form-control" id="item">
                          </div>
                          <button type="submit" class="btn btn-default">Редагувати</button>
                          <a href="/admin/menu" class="btn btn-warning">Назад</a>
                      </form>
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
