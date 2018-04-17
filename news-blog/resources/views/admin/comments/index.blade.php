@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Редагування коментів</div>
    </div>
    <div class="panel-body">
      @include ('layouts.errors')
      @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
      @endif
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th>Ким залишений комент</th>
          <th>Заголовок коменту</th>
          <th>Тіло коменту</th>
          <th>Голоси за</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th><span class="glyphicon glyphicon-edit"></span></th>
          <th><span class="glyphicon glyphicon-trash"></span></th>         
        </tr>
      </thead>
      <tbody>
            @foreach ($comments as $comment)
            <tr>
              <td>{{ $comment->user }}</td>
              <td>{{ $comment->title }}</td>
              <td>{{ $comment->body }}</td>
              <td>{{ $comment->votes_up }}</td>
              <td>{{ $comment->created_at }}</td>
              <td>{{ $comment->created_at }}</td>
              <td>
                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning btn-sm">
                  Редагувати
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $comment->id }}" method="post" action="{{ route('comments.destroy', $comment->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити комент?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $comment->id }}').submit();
                  } else {
                    event.preventDefault();
                  }">
                  Видалити
                </button>
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{ $comments->links() }}
    </div>
  </div>

@endsection
