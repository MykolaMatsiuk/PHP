@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Реклама</div>
      <a href="/admin/commercials/create" class="col-lg-offset-5 btn btn-success">Нова</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
       id="example">
      <thead>
        <tr>
          <th>Заголовок</th>
          <th>Ціна</th>
          <th>Компанія</th> 
          <th><span class="glyphicon glyphicon-edit"></span></th>
          <th><span class="glyphicon glyphicon-trash"></span></th>         
        </tr>
      </thead>
      <tbody>
        @foreach ($commercials as $commercial)
            <tr>
              <td>
                {{ $commercial->title }}
              </td>
              <td>
                {{ $commercial->price }}
              </td>
              <td>
                {{ $commercial->company }}
              </td>
              <td>
                <a href="{{ route('commercials.edit', $commercial->id) }}" class="btn btn-warning btn-sm">
                  Редагувати
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $commercial->id }}" method="post" action="{{ route('commercials.destroy', $commercial->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити рекламу?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $commercial->id }}').submit();
                  } else {
                    event.preventDefault();
                  }">
                  Видалити
                </button>
              </td>
            </tr>
        </form>
        @endforeach
      </tbody>
    </table>
    {{ $commercials->links() }}
    </div>
  </div>

@endsection
