@extends ('admin.layouts.app')

@section ('script')
  <script src="{{ asset('js/admin-image-preview.js') }}" defer></script>
@endsection

@section ('main')

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Редагування товару
        </div>
        @include ('layouts.errors')
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('items.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="tit">Назва</label>
                            <input type="text" name="name"
                            value="{{ $item->name }}" class="form-control" id="tit" />
                        </div>
                        <div class="form-group">
                            <label for="model">Модель</label>
                            <input type="text" name="model"
                            value="{{ $item->model }}" class="form-control" id="model" />
                        </div>
                        <div class="form-group">
                            <label for="size">Розмір</label>
                            <select name="size[]" class="form-control" id="size" multiple>
                            @foreach ($sizes as $size)
                                @if ($item->sizes)
                                    @foreach ($item->sizes as $item_size)
                                        @if ($item_size->id == $size->id)
                                        <option value="{{ $size->id }}" selected>
                                            {{ $size->size }}
                                        </option>
                                        @else
                                        <option value="{{ $size->id }}">
                                            {{ $size->size }}
                                        </option>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group input-holder">
                            <label>Додати зображення</label>
                            <input type="file" class="inp" name="image[]" multiple="multiple">
                            <div class="result">
                                <ul class="img"></ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body-desc">Опис товару</label>
                            <textarea name="description" id="body-desc" class="form-control">
                                {{ $item->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="cat">Категорія</label>
                            <select name="category" class="form-control" id="cat">
                            @foreach ($categories as $category)
                                @if ($item->category_id == $category->id)
                                <option value="{{ $category->id }}" selected>
                                    {{ $category->name }}
                                </option>
                                @else
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Ціна</label>
                            <input type="number" name="price" id="price" value="{{ $item->price }}">
                        </div>
                        <div class="form-group">
                            <label for="weight">Важність</label>
                            <input type="number" name="weight" id="weight" value="{{ $item->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="tag">Тег</label>
                            <select name="tag_id[]" class="form-control" multiple>
                            @foreach ($tags as $tag)
                                @if ($item->tags)
                                    @foreach ($item->tags as $item_tag)
                                        @if ($item_tag->id == $tag->id)
                                        <option value="{{ $tag->id }}" selected>
                                            {{ $tag->name }}
                                        </option>
                                        @else
                                        <option value="{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </option>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Оновити</button>
                        <button type="reset" class="btn btn-default">Очистити</button>
                        <a href="/admin/items" class="btn btn-warning">Назад</a>
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
