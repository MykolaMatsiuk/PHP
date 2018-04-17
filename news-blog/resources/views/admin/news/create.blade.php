@extends ('admin.layouts.app')


@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Добавити новини
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::open(array('method' => 'post', 'action' => 'Admin\NewController@store', 'enctype' => 'multipart/form-data')) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tit">Заголовок</label>
                            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'tit']) }}
                        </div>
                        <div class="form-group">
                            <label>Вибрати зображення</label>
                            {{ Form::file('image') }}
                        </div>
                        <div class="form-group">
                            <label for="body-content">Тіло новини</label>
                            {{ Form::textarea('content', null, ['class' => 'form-control', 'id' => 'body-content', 'rows' => 5]) }}
                        </div>
                        <div class="form-group">
                            <label for="cat">Категорія</label>
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'cat']) }}
                        </div>
                        <div class="form-group">
                            <label for="cat">Аналітика</label>
                            {{ Form::checkbox('analytic', '1') }}
                        </div>
                        <div class="form-group">
                            <label for="tag">Тег</label>
                            {{ Form::select('tag_id', $tags, null, ['class' => 'form-control', 'id' => 'tag', 'multiple' => 'multiple', 'name' => 'tag_id[]']) }}
                        </div>
                        <button type="submit" class="btn btn-default">Зберегти</button>
                        <button type="reset" class="btn btn-default">Очистити</button>
                        <a href="/admin/news" class="btn btn-warning">Назад</a>
                    {!! Form::close() !!}
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
