<div class="card" >
    <img src="{{ '/storage/images/'.$post->image }}" style="width: 18rem;" class="card-img-top" alt="my post image">

    <div class="card-body">
      <h5 class="card-title">{{ $post->company }}</h5>
      <h5 class="card-title">{{ $post->car_name }}</h5>
      <h5 class="card-title">{{ $post->year }}</h5>
      <h5 class="card-title">{{ $post->price }}</h5>
      <h5 class="card-title">{{ $post->car_kind }}</h5>
      <h5 class="card-title">{{ $post->car_appearnce }}</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">등록일 : {{ $post->created_at->diffForHumans() }}</li>
      <li class="list-group-item">변경일 : {{ $post->updated_at->diffForHumans() }}</li>
    </ul>
    @auth
        @if (auth()->user()->id == $post->user_id)
        <div class="card-body flex">
            <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-warning">수정하기</a>
            <form id="form" class="ml-4" method="post" onsubmit="event.preventDefault(); confirmDelete()">
                @csrf
                @method('delete')
                {{-- <input type="hidden" name="_method" value="delete"> --}}
                <button class="btn btn-danger" type="submit">삭제하기</button>
            </form>
        </div>
        @endif
    @endauth
  </div>
</div>
  <script type="application/javascript">
      function confirmDelete(e){
          myform = document.getElementById('form');
          flag = confirm('정말 삭제하시겠습니까?');
          //확인 취소를 물어보는 함수
          if(flag){
              //서브밋...
              myform.submit();
          }
        //   e.preventDefault();  //form이 서버로 전달되는 것을 막아준다.
      }
  </script>
</div>
