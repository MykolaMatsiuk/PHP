@extends('admin.layouts.app')

@section('main')
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
              Редагування елемента підменю
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-6">
                      <form action="{{ route('submenu.update', $item->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                          <div class="form-group">
                              <label for="item">Заголовок</label>
                              <input type="text" name="title" value="{{ $item->title }}" class="form-control" id="item">
                          </div>
                          <div class="form-group">
                              <label for="parent_item">Відповідний елемент меню</label>
                              <select name="parent_item" class="form-control">
                              @foreach ($parentItems as $parentItem)
                                  @if ($parentItem->id == $item->navmenu_id)
                                  <option value="{{ $parentItem->id }}" selected>
                                      {{ $parentItem->title }}
                                  </option>
                                  @else
                                  <option value="{{ $parentItem->id }}">
                                      {{ $parentItem->title }}
                                  </option>
                                  @endif
                              @endforeach
                              </select>
                          </div>
                          <button type="submit" class="btn btn-default">Редагувати</button>
                          <a href="/admin/submenu" class="btn btn-warning">Назад</a>
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
