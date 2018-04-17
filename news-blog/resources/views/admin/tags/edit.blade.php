@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити теги
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form action="{{ route('tags.update', $tag->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                          <div class="form-group">
                              <label for="tag">Заголовок тега</label>
                              <input type="text" name="title" class="form-control" id="tag" value="{{ $tag->title }}">
                          </div>
                          <button type="submit" class="btn btn-default">Оновити</button>
                          <a href="/admin/tags" class="btn btn-warning">Назад</a>
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
