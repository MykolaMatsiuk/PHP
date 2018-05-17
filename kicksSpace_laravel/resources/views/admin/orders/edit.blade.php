@extends ('admin.layouts.app')

@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading" style="margin: 10px">
            Редагування статусу замовлення
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="status">Статус</label>
                            <input type="text" name="status"
                            value="{{ $order->status }}" class="form-control" id="status" />
                        </div>
                        <button type="submit" class="btn btn-default">Оновити</button>
                        <button type="reset" class="btn btn-default">Очистити</button>
                        <a href="/admin/orders" class="btn btn-warning">Назад</a>
                    </form>
                </div>
                <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>




@endsection
