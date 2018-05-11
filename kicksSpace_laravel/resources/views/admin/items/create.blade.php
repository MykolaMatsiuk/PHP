@extends ('admin.layouts.app')


@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Добавити товар
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    {!! Form::open(array('method' => 'post', 'action' => 'Admin\ItemController@store', 'enctype' => 'multipart/form-data')) !!}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="tit">Назва</label>
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'tit']) }}
                        </div>
                        <div class="form-group">
                            <label for="mod">Модель</label>
                            {{ Form::text('model', null, ['class' => 'form-control', 'id' => 'mod']) }}
                        </div>
                        <div class="form-group input-holder">
                            <label for="size">Розмір</label>
                            {{ Form::select('size', $sizes, null, ['class' => 'form-control', 'id' => 'size', 'multiple' => 'multiple', 'name' => 'size[]']) }}
                            <div class="result">
                                <ul class="img"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Вибрати зображення</label>
                            {{ Form::file('image[]', array('multiple' => 'multiple', 'id' => 'input')) }}
                            <div class="result"></div>
                        </div>
                        <div class="form-group">
                            <label for="body-desc">Опис товару</label>
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'body-desc', 'rows' => 5]) }}
                        </div>
                        <div class="form-group">
                            <label for="cat">Категорія</label>
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'cat']) }}
                        </div>
                        <div class="form-group">
                            <label for="price">Ціна</label>
                            {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price']) }}
                        </div>
                        <div class="form-group">
                            <label for="weight">Важність</label>
                            {{ Form::number('weight', null, ['class' => 'form-control', 'id' => 'weight']) }}
                        </div>
                        <div class="form-group">
                            <label for="tag">Тег</label>
                            {{ Form::select('tag_id', $tags, null, ['class' => 'form-control', 'id' => 'tag', 'multiple' => 'multiple', 'name' => 'tag_id[]']) }}
                        </div>
                        <button type="submit" class="btn btn-default">Створити</button>
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
