@extends ('layouts.master')

@section ('content')
  <div class="container orders-view">
  <h3>Замовлення</h3>
    @foreach ($orders as $order)
      <div class="table-responsive">
        <table class="table">
          <thead>
              <tr>
                <th scope="col">Дата створення</th>
                <th scope="col">Товари</th>
                <th scope="col">статус</th>
                <th scope="col">Загальна вартість</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{ $order->created_at->format('d/m/Y') }}</th>
                <td>
                  @foreach ($order->items as $item)
                    {{ $item->name }} {{ $item->model }} розмір: {{ $item->chosenSize }} ціна: {{ $item->price }}грн<br /><br />
                  @endforeach
                </td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->total }}грн</td>
              </tr>
            </tbody>
        </table>
        <br />
      </div>
    @endforeach
  </div>
@endsection

