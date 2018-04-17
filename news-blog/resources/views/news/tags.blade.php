@extends ('layouts.master')


@section ('content')
  <h2>Новини, які мають тег {{ $tag->title }}:</h2>
  <ul>
    @foreach ($news as $new)
      <li><a href="/{{ $category->id }}/{{ $new->id }}">{{ $new->title }}</a></li>
    @endforeach
    {{ $news->links() }}
  </ul>
@endsection

