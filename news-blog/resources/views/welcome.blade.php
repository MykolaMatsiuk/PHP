@extends ('layouts.master')

@section ('content')
    <div class="content">
        <div class="title">
            новини
        </div>
        <div class="exper">
            @include ('filter')
            <div class="top">
                <div class="commentators">
                    <h5>Топ комментатори:</h5>
                        @foreach ($comments as $comment)
                            <a href="/comments/{{ $comment->user->id }}">{{ $comment->user->name }}&nbsp;</a>
                        @endforeach     
                </div>
                <div class="top-news">
                    <h5>Топ новини:</h5>
                    <ul>
                    @foreach ($topNews as $news)
                        <li>
                            <a href="/{{ $news->category_id }}/{{ $news->id }}">{{ $news->title }}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div> 
        </div>
        
        <div class="links">
            @foreach ($categories as $category)
                <div class="item">
                    <ul>              
                        <a href="/{{ $category->id }}">{{ $category->title }}</a>
                        @foreach ($category->news as $news)
                            @if ($loop->iteration <= 5)
                                <li>{{ $news->title }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
        @include ('slider')       
    </div>
@endsection

@section ('script')
    <script>
        $(function() {
            $('#datepicker-from').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });
        $(function() {
            $('#datepicker-to').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection
