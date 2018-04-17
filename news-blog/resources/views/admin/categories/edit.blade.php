@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Редагування категорії
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form action="{{ route('categories.update', $category->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                          <div class="form-group">
                              <label for="cat">Заголовок категорії</label>
                              <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="cat">
                          </div>
                          <button type="submit" class="btn btn-default">Редагувати</button>
                          <a href="/admin/categories" class="btn btn-warning">Назад</a>
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
