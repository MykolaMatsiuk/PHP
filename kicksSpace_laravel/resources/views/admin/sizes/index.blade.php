@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Розміри</div>
      <a href="/admin/sizes/create" class="col-lg-offset-5 btn btn-success">Новий</a>
    </div>
    @include ('layouts.errors')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th>Розмір</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th>Редагувати</th>
          <th>Видалити</th>         
        </tr>
      </thead>
      <tbody>
            @foreach ($sizes as $size)
            <tr>
              <td>
                {{ $size->size }}
              </td>
              <td>
                {{ $size->created_at }}
              </td>
              <td>
                {{ $size->updated_at }}
              </td>
              <td>
                <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-warning btn-sm">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $size->id }}" method="post" action="{{ route('sizes.destroy', $size->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити розмір?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $size->id }}').submit();
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
    {{ $sizes->links() }}
    </div>
  </div>

@endsection
