<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('posts.index', ['posts' => $posts]);
    }

    public function myindex()
    {
        // $posts = auth()->user()->posts->pageinate(); auth()는 전역 함수

        // return view('posts.index', compact('posts'));
        $id = Auth::user()->id;

        $posts = Post::where('user_id', $id)->latest()->paginate(5);

        // dd($posts);

        return view('posts.my_index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'company' => 'required',
                'car_name' => 'required',
                'year' => 'required',
                'price' => 'required',
                'car_kind' => 'required',
                'car_appearnce' => 'required',
                'image' => 'required'
            ]
        );

        $company = $request->company;
        $car_name = $request->car_name;
        $year = $request->year;
        $price = $request->price;
        $car_kind = $request->car_kind;
        $car_appearnce = $request->car_appearnce;

        $post = new Post();

        $post->company = $company;
        $post->car_name = $car_name;
        $post->year = $year;
        $post->price = $price;
        $post->car_kind = $car_kind;
        $post->car_appearnce = $car_appearnce;

        $post->user_id = Auth::user()->id;

        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
            $post->image = $fileName;
        };


        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'company' => 'required',
                'car_name' => 'required',
                'year' => 'required',
                'price' => 'required',
                'car_kind' => 'required',
                'car_appearnce' => 'required',
                'image' => 'required'
            ]
        );

        $company = $request->company;
        $car_name = $request->car_name;
        $year = $request->year;
        $price = $request->price;
        $car_kind = $request->car_kind;
        $car_appearnce = $request->car_appearnce;

        $post = Post::find($id);

        $post->company = $company;
        $post->car_name = $car_name;
        $post->year = $year;
        $post->price = $price;
        $post->car_kind = $car_kind;
        $post->car_appearnce = $car_appearnce;

        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $post->image = $fileName;
            $request->image->storeAs('public/images/', $fileName);
        }
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
