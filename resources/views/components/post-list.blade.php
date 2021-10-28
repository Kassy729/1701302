<div>
    <table class="table table-hover mt-5">
        <thead>
          <tr>
            <th scope="col">제조회사</th>
            <th scope="col">자동차 명</th>
            <th scope="col">제조년도</th>
            <th scope="col">작성자</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($posts as $post)
          <tr>
            <td><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->company }}</a></td>
              <td>{{ $post->car_name }}</td>
              <td>{{ $post->year }}</td>
              <td>{{ $post->user->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $posts->links() }}
</div>
