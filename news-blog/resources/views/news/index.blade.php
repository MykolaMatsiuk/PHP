@extends ('layouts.master')

@section ('content')
  <div class="item-view">
    <h1>{{ $news->title }}</h1>
    <img src="/../{{ $news->pic_src }}" alt="{{ $news->title }}">
    @guest
    @if ($news->analytic)
    <p class="text">{!! \Illuminate\Support\Str::words($news->content, 5, '...') !!}</p>
    @endif
    @endauth
    <p class="text">{{ $news->content }}</p>
    <p class="counter"><span id="ajaxRes">0</span> 
      -кількість людей, які на даний час переглядають цю новину.<br>
      <span id="ajaxTotal">0</span> 
      -кількість людей, які загалом читали цю новину.
    </p>
  </div>
  @unless ($news->tags->isEmpty())
    <div class="tags-content">
      <h5 class="tags-title">Теги:</h5>
      <ul>
        @foreach ($news->tags as $tag)
          <li><a href="/{{ $category->id }}/{{ $news->id }}/{{ $tag->id }}">{{ $tag->title }}</a></li>
        @endforeach
      </ul>
    </div>
  @endunless
  <hr>
  <div class="comments">
    <ul class="list-group">
      @foreach ($comments as $comment)
        <li class="list-group-item">
          <strong>
            {{ $comment->created_at }}: &nbsp;
          </strong>
          {{ $comment->body }} /
          <i>{{ $comment->user->email }}</i>
          <form>
            <span class="vote-up-count" id="up{{$comment->id}}"></span>
            <input class="commId" type="hidden" value="{{$comment->id}}" />
            <img src="/images/up.png" alt="up" class="vote-up" />
            <img src="/images/down.png" alt="down" class="vote-down" />
            <span class="vote-down-count" id="down{{$comment->id}}"></span>
          </form>
          <!-- <div class="comm"></div> -->
        </li>
      @endforeach
    </ul>
  </div>
  @auth
    <hr>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="/{{ $category->id }}/{{ $news->id }}/comments">

          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="body" placeholder="Залиш коментар" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Залишити коментар</button>
          </div>
        </form>

        @include ('layouts.errors')
      </div>
    </div>
  @endauth
@endsection

@section ('script')
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var total = 0;
    setInterval(() => {
      $.ajax({
        type: 'GET',
        url: '/api/getviewers',
        success: (result) => {
          total += result;
          $('#ajaxRes').html(result);
          $('#ajaxTotal').html(total);
        }
      });
    }, 3000);
    $('.vote-up').click(function(e) {
    let data = { commId: $(this).prev().val() };
      $.ajax({
        type: 'POST',
        url: '/api/upvote',
        data: data,
        success: (result) => {
          $('#up' + data.commId).html(result.up);
          $('#down' + data.commId).html(result.down);
        }
      });
    });
    $('.vote-down').click(function(e) {
      let data = { commId: $(this).prev().prev().val() };
      $.ajax({
        type: 'POST',
        url: '/api/downvote',
        data: data,
        success: (result) => {
          $('#up' + data.commId).html(result.up);
          $('#down' + data.commId).html(result.down);
        }
      });
    });
    $(document).ready(function (e) {
      let arr = [];
      let a = $('ul.list-group').find('input');
      $.each(a, function (item, i){
        arr.push(i.value);
      });
      let data = { commId: arr };
      $.ajax({
        type: 'GET',
        url: '/api/getvotes',
        data: data,
        success: function(result) {
          data.commId.forEach(function(item, i) {
            $('#up' + item).html(result.up[item])
              .css({'color': 'green', 'font-weight': 'bold'});
            $('#down' + item).html(result.down[item])
              .css({'color': 'red', 'font-weight': 'bold'});
          });
        }
      });
    });
  </script>
@endsection ('script')
