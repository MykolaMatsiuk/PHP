@extends ('layouts.master')


@section ('content')
    <div class="news-list">
        <h1>{{ $name }}</h1>
        <ul class="news-ul">
            @if ($news->count())
                @foreach ($news as $n)
                    <li><a href="/{{ $categoryId }}/{{ $n->id }}">{{ $n->title }}</a></li>
                @endforeach
            @endif
            {{ $news->links() }}
        </ul>
    </div>
@endsection

