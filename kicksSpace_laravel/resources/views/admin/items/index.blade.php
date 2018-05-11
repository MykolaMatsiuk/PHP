@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Товари</div>
      <a href="/admin/items/create" class="col-lg-offset-5 btn btn-success">Новий</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
       id="example">
      <thead>
        <tr>
          <th>Назва</th>
          <th>Модель</th>
          <th>Розміри</th>
          <th>Категорія</th>
          <th>Теги</th>
          <th>Опис</th>
          <th>Ціна</th>
          <th>Важність</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th>Редагувати</th>
          <th>Видалити</th>         
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td>
                {{ $item->model }}
              </td>
              <td>
                @foreach ($item->sizes as $size)
                  {{ $size->size }}
                @endforeach
              </td>
              <td>
                {{ $item->category->name }}
              </td>
              <td>
                @foreach ($item->tags as $tag)
                  {{ $tag->name }}
                @endforeach
              </td>
              <td>
                {{ $item->description }}
              </td>
              <td>
                {{ $item->price }}
              </td>
              <td>
                {{ $item->weight }}
              </td>
              <td>
                {{ $item->created_at }}
              </td>
              <td>
                {{ $item->updated_at }}
              </td>
              <td>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $item->id }}" method="post" action="{{ route('items.destroy', $item->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити товар?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $item->id }}').submit();
                  } else {
                    event.preventDefault();
                  }">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
        </form>
        @endforeach
      </tbody>
    </table>
    {{ $items->links() }}
    </div>
  </div>

@endsection
