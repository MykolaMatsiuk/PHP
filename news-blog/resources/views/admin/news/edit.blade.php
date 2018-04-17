@extends ('admin.layouts.app')


@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Редагування новини
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('news.update', $new->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="tit">Заголовок</label>
                            <input type="text" name="title"
                            value="{{ $new->title }}" class="form-control" id="tit" />
                        </div>
                        <div class="form-group">
                            <label>Вибрати зображення</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="body-content">Тіло новини</label>
                            <textarea name="content" id="body-content" class="form-control">
                                {{ $new->content }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="cat">Категорія</label>
                            <select name="category" class="form-control">
                            @foreach ($categories as $category)
                                @if ($new->cat_id == $category->id)
                                <option value="{{ $category->id }}" selected>
                                    {{ $category->title }}
                                </option>
                                @else
                                <option value="{{ $category->id }}">
                                    {{ $category->title }}
                                </option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag">Аналітика</label>
                            @if ($new->analytic)
                            <input type="checkbox" name="analytic" value="{{$new->analytic}}" checked="checked"/>
                            @else
                            <input type="checkbox" name="analytic" value="{{$new->analytic}}" />
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tag">Тег</label>
                            <select name="tag_id[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Оновити</button>
                        <button type="reset" class="btn btn-default">Очистити</button>
                        <a href="/admin/news" class="btn btn-warning">Назад</a>
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
