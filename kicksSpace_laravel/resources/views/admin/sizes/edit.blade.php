@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити розмір
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form action="{{ route('sizes.update', $size->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                          <div class="form-group">
                              <label for="size">Розмір</label>
                              <input type="text" name="size" class="form-control" id="size" value="{{ $size->size }}">
                          </div>
                          <button type="submit" class="btn btn-default">Оновити</button>
                          <a href="/admin/sizes" class="btn btn-warning">Назад</a>
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
