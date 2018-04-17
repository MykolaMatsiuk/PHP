<div class="filter">
    {!! Form::open(array('class' => 'filter-from', 'method' => 'get', 'url' => url('/search'))) !!}
        <div class="dropdown">
            <button class='date-filter btn btn-outline-primary btn-sm dropdown-toggle' id="filter-dat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Пошук по даті:</button>
            <div class="dropdown-menu" aria-labelledby="filter-dat">
                <span class="dropdown-item">
                    <span>з</span>{{ Form::text('date_from', '', array('id' => 'datepicker-from')) }}
                    
                </span>
                <span class="dropdown-item">
                    <span>по</span>{{ Form::text('date_to', '', array('id' => 'datepicker-to')) }}
                    
                </span>
            </div>
        </div>
        <div class="dropdown">
            <button class="tag-filter btn btn-outline-primary btn-sm dropdown-toggle" id="filter-tag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">По тегам:</button>
            <div class="dropdown-menu" aria-labelledby="filter-tag">
                @foreach ($tags as $tag)<span class="dropdown-item"><span>{{$tag->title}}</span>
                    {{ Form::checkbox('tag-name'.$tag->id, $tag->title, null, array('class' => 'form-group-item')) }}</span>
                @endforeach
            </div>
        </div>
        <div class="dropdown">
            <button class="category-filter btn btn-outline-primary btn-sm dropdown-toggle" id="filter-cat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">По категоріям:</button>
            <div class="dropdown-menu" aria-labelledby="filter-tag">
                @foreach ($categories as $category)<span class="dropdown-item"><span>{{$category->title}}</span>
                    {{ Form::checkbox($category->id, $category->title, null, array('class' => 'form-group-item')) }}
                </span>
                @endforeach
            </div>
        </div>
        <p>{!! Form::submit('Пошук', ['class' => 'btn btn-outline-success btn-sm']) !!}</p>
    {!! Form::close() !!}
</div>
