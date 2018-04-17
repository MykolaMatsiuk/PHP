@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Добавити рекламу
          </div>
          @include ('layouts.errors')
          @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      {!! Form::open(array('method' => 'post', 'action' => 'Admin\CommercialController@store')) !!}
                      {{ csrf_field() }}
                          <div class="form-group">
                              <label for="title">Заголовок реклами</label>
                              {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
                          </div>
                          <div class="form-group">
                              <label for="company">Компанія(сайт)</label>
                              {{ Form::text('company', null, ['class' => 'form-control', 'id' => 'company']) }}
                          </div>
                          <div class="form-group">
                              <label for="price">Ціна</label>
                              {{ Form::input('number', 'price', null, ['class' => 'form-control', 'id' => 'price', 'step' => 0.01]) }}
                          </div>
                          <button type="submit" class="btn btn-default">Зберегти</button>
                          <button type="reset" class="btn btn-default">Очистити</button>
                          <a href="/admin/commercials" class="btn btn-warning">Назад</a>
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
