@extends ('layouts.master')


@section ('content')
    <div class="news-list">
        <h1>Результат пошуку: </h1>
        <ul class="news-ul">
            @if ($news->count())
                @foreach ($news as $n)
                    <li><a href="/{{ $n->category_id }}/{{ $n->id }}">{{ $n->title }}</a></li>
                @endforeach
            @endif
            {{ $news->links() }}
        </ul>
    </div>
@endsection
