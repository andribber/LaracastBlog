<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function index(){

        return view('test', [
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }


    public function show (Post $post){
        return view('news', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store() {

        $attributes = request()->validate([
            'title' => 'required',
            'slug'=> ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id'),]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect(route('home'));
    }


    public function manager() {
        return view('admin-posts', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function edit (Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    public function update(Post $post) {

        $attributes = request()->validate([
            'title' => 'required',
            'slug'=> ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id'),]
        ]);

        $post->update($attributes);

        return back()->with('success', 'Your post has been succesfully updated');
    }


    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success', 'Your post has been deleted');
    }



}
