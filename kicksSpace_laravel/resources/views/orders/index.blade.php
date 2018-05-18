@extends ('layouts.master')

@section ('content')
  <div class="container orders-view">
  <h3>Замовлення</h3>
      <div class="table-responsive">
        <table class="table">
          <thead>
              <tr>
                <th scope="col">Дата створення</th>
                <th scope="col">Номер замовлення</th>
                <th scope="col">Товари</th>
                <th scope="col">статус</th>
                <th scope="col">Вартість</th>
              </tr>
            </thead>
            @foreach ($orders as $order)
            <tbody>
              <tr>
                <th scope="row">{{ $order->created_at->format('d/m/Y') }}</th>
                <th style="text-align: center">{{ $order->id }}</th>
                <td>
                    {{ $order->name }} {{ $order->model }} розмір: {{ $order->size }} ціна: {{ $order->price }}грн<br /><br />
                </td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->price }}грн</td>
              </tr>
            </tbody>
            @endforeach
        </table>
        <br />
      </div>
  </div>
@endsection

