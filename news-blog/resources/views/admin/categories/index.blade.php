@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Категорії</div>
      <a href="/admin/categories/create" class="btn btn-success">Нова</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th>Ім'я категорії</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th><span class="glyphicon glyphicon-edit"></span></th>
          <th><span class="glyphicon glyphicon-trash"></span></th>         
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>
              {{ $category->title }}
            </td>
            <td>
              {{ $category->created_at }}
            </td>
            <td>
              {{ $category->updated_at }}
            </td>
            <td>
              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                Редагувати
              </a>
            </td>
            <td>
              <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('categories.destroy', $category->id) }}" style="display: none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>
              <button type="button" class="btn btn-danger btn-sm" onclick="
                if(confirm('Видалити категорію?')) {
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $category->id }}').submit();
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
    {{ $categories->links() }}
    </div>
  </div>

@endsection
