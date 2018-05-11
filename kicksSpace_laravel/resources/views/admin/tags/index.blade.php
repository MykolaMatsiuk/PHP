@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Теги</div>
      <a href="/admin/tags/create" class="col-lg-offset-5 btn btn-success">Новий</a>
    </div>
    @include ('layouts.errors')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th>Назва тегу</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th>Редагувати</th>
          <th>Видалити</th>         
        </tr>
      </thead>
      <tbody>
            @foreach ($tags as $tag)
            <tr>
              <td>
                {{ $tag->name }}
              </td>
              <td>
                {{ $tag->created_at }}
              </td>
              <td>
                {{ $tag->updated_at }}
              </td>
              <td>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $tag->id }}" method="post" action="{{ route('tags.destroy', $tag->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити тег?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $tag->id }}').submit();
                  } else {
                    event.preventDefault();
                  }">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $tags->links() }}
    </div>
  </div>

@endsection
