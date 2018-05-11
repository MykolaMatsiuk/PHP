@extends ('admin.layouts.app')


@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Редагування коментів
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('comments.update', $comment->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="tit">Тіло коменту</label>
                            <input type="text" name="body"
                            value="{{ $comment->body }}" class="form-control" id="tit" />
                        </div>
                        <button type="submit" class="btn btn-default">Оновити</button>
                        <a href="/admin/comments" class="btn btn-warning">Назад</a>
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
