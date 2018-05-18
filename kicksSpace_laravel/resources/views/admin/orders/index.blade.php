@extends('admin.layouts.app')

@section('main')
  <div class="content-box-large">
    <div class="panel-heading" style="margin: 10px">
      <div class="panel-title">Замовлення</div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="panel-body">
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
       id="example">
      <thead>
        <tr>
          <th>Дата створення</th>
          <th>Номер замовлення</th>
          <th>Замовник</th>
          <th>Товар</th>
          <th>Загальна вартість</th>
          <th>статус</th> 
          <th>Редагувати</th>
          <th>Видалити</th>        
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
            <tr>
              <td>
                {{ $order->created_at }}
              </td>
              <td>
                {{ $order->id }}
              </td>
              <td>
                {{ $order->name }} {{ $order->email }} {{ $order->tel }}
              </td>
              <td>
                  {{ $order->title }} {{ $order->model }} розмір: {{ $order->size }}
                  ціна: {{ $order->price }}<br />
              </td>
              <td>
                {{ $order->total }}
              </td>
              <td>
                {{ $order->status }}
              </td>
              <td>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
              </td>
              <td>
                <form id="delete-form-{{ $order->id }}" method="post" action="{{ route('orders.destroy', $order->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
                <button type="button" class="btn btn-danger btn-sm" onclick="
                  if(confirm('Видалити товар?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $order->id }}').submit();
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
    {{ $orders->links() }}
    </div>
  </div>

@endsection
