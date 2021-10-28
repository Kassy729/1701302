<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $request->validate(['comment' => ['required']]);
        //정당성 검사

        Comment::create(
            [
                'comment' => $request->comment,
                'user_id' => auth()->user()->id,
                'post_id' => $post_id
            ]
        );
        //모델에 fillable 정의 해줘야함

        return redirect()->route('posts.show', ['post' => $post_id]);
    }

    public function destroy(Request $request, $id)
    {
        $page = $request->page;

        $post = DB::table('comments')->where('id', $id);

        $post->delete();

        return redirect()->route('posts.show', ['post' => $page]);
    }
}
