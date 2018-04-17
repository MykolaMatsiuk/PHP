@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title">Новини</div>
      <a href="/admin/news/create" class="col-lg-offset-5 btn btn-success">Нова</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
       id="example" style="table-layout: fixed; width: 760px;">
      <thead>
        <tr>
          <th>Заголовок</th>
          <th>Категорія</th>
          <th>Тіло новини</th>
          <th>Шлях до зобр.</th>
          <th>Аналітика</th>
          <th>Дата створення</th>
          <th>Дата оновлення</th> 
          <th><span class="glyphicon glyphicon-edit"></span></th>
          <th><span class="glyphicon glyphicon-trash"></span></th>         
        </tr>
      </thead>
      <tbody>
        @foreach ($news as $new)
            <tr>
              <td>
                {{ $new->title }}
              </td>
              <td>
                {{ $new->cat_title }}
              </td>
              <td>
                {{ $new->content }}
              </td>
              <td style="width: 100px; overflow: hidden;">
                {{ $new->pic_src }}
              </td>
              <td style="width: 10px;">
                {{ $new->analytic }}
              </td>
              <td>
                {{ $new->created_at }}
              </td>
              <td>
                {{ $new->updated_at }}
              </td>
              <td>
                <a href="{{ route('news.edit', $new->id) }}" class="btn btn-warning btn-sm">
                  Редагувати
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $new->id }}" method="post" action="{{ route('news.destroy', $new->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити новину?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $new->id }}').submit();
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
    {{ $news->links() }}
    </div>
  </div>

@endsection
