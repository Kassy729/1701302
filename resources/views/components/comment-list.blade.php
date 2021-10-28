<div>
    <label for="exampleFormControlInput1" class="form-label">댓글</label>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">내용</th>
                    <th scope="col">작성자</th>
                    <th scope="col">삭제</th>
                </tr>
            </thead>
            @foreach ($post->comments as $comment)
                <tbody>
                    <tr>
                        <td>{{ $comment->comment }}</td>
                        <td>{{$comment->user->name }}</td>
                        <td>
                            @if (auth()->user())
                                @if (auth()->user()->id == $comment->user_id)
                                <form action="{{ route( 'comment.delete', ['id'=>$comment->id, 'page'=>$post->id] )}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">삭제</button>
                                </form></p>
                                @endif
                            @else
                                <span>로그인 필요</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
</div>
