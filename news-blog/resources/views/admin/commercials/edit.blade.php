@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Редагувати рекламу
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                    <form action="{{ route('commercials.update', $commercial->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      <div class="form-group">
                          <label for="title">Заголовок реклами</label>
                          <input type="text" name="title" value="{{ $commercial->title }}" class="form-control" id="title" />
                      </div>
                      <div class="form-group">
                          <label for="company">Компанія(сайт)</label>
                          <input type="text" name="company" value="{{ $commercial->company }}" class="form-control" id="company" />
                      </div>
                      <div class="form-group">
                          <label for="price">Ціна</label>
                          <input type="number" name="price" value="{{ $commercial->price }}" step="0.01" class="form-control" id="price" />
                      </div>
                      <button type="submit" class="btn btn-default">Оновити</button>
                      <button type="reset" class="btn btn-default">Очистити</button>
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
