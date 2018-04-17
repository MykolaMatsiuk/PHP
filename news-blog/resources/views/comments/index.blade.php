@extends ('layouts.master')

@section ('content')
    <h1>Коментарі залишені {{ $user->name }}</h1>
    <ul>
    @foreach ($comments as $comment)
        <li>{{ $comment->body }} - {{ $comment->created_at }}</li>
    @endforeach
    {{ $comments->links() }}
    </ul>
@endsection
