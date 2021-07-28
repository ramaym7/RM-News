<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::orderBy('id', 'desc')->paginate(5),
            'categories' => Category::all()
        ];
        return view('admin.dashbord', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
        ];
        return view('admin.create_news', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->all();
        $imgpath = $request->file('image')->store('images', 'public');
        $attr['image'] = $imgpath;
        Post::create($attr);
        session()->flash('success', 'Berita berhasil ditambahkan!');
        return redirect()->to(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('admin.news_show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'categories' => Category::all(),
            'post' => $post
        ];
        return view('admin.edit_news', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attr = $request->all();

        if (request()->file('image')) {
            Storage::delete($post->image);
            $imgpath = $request->file('image')->store('images', 'public');
        } else {
            $imgpath = $post->image;
        }

        $attr['image'] = $imgpath;
        $post->update($attr);
        session()->flash('success', 'Berita berhasil diubah!');
        return redirect()->to(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        session()->flash('success', 'Berita berhasil dihapus!');
        return redirect()->to(route('dashboard'));
    }

    public function uploadImage(Request $request)
    {

        $imgpath = $request->file('file')->store('images', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
