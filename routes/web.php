<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;

//Newsletter
Route::post('newsletter', NewsletterController::class);

//Posts
Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostsController::class, 'show']);

//Comments
Route::post('post/{post:slug}/comment', [CommentController::class, 'store']);

//Register
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//Session
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionController::class, 'login'])->middleware('guest');
Route::post('sessions', [SessionController::class, 'store']);

//Admin

Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts/create', [PostsController::class, 'create']);
    Route::post('admin/posts', [PostsController::class, 'store']);
    Route::get('admin/posts', [PostsController::class, 'manager']);
    Route::get('admin/posts/{post:id}/edit', [PostsController::class, 'edit'])->name('editar');
    Route::patch('admin/posts/{post:id}', [PostsController::class, 'update']);
    Route::delete('admin/posts/{post:id}', [PostsController::class, 'destroy']);
});




//Route::get('authors/{author:username}', function (User $author){
//    return view('test', [
//        'posts'=> $author->posts
//    ]);
//});




//Route::get('categories/{category:slug}', function (Category $category) {
//    return view('test', [
//        'posts'=> $category->posts,
//        'categories' => Category::all()
//    ]);
//});

/*
posts = collect(File::files(resource_path("post/")))
    ->map(fn($file) => YamlFrontMatter::parseFile($file))
    ->map(fn($document) =>
        new Post (
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        )
    );


$posts = array_map(function ($file) {
        $a=0;
        $document[] = YamlFrontMatter::parseFile($file);
        return new Post (
            $document[$a]->title,
            $document[$a]->excerpt,
            $document[$a]->date,
            $document[$a]->body(),
            $document[$a]->slug
        );
    $a++;
    }, $files);*/

    /*$a=0;
    foreach ($files as $file) {
        $document[] = YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $document[$a]->title,
            $document[$a]->excerpt,
            $document[$a]->date,
            $document[$a]->body(),
            $document[$a]->slug

        );
    $a++;
    }*/
