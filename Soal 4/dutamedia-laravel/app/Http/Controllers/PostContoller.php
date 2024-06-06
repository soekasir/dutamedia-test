<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostContoller extends Controller
{
    public function index(){
        $posts = Post::with('writer:id,username')->get();
        return PostDetailResource::collection($posts);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function store(Request $request){
        $request->validate(([
            'title' => 'required|max:255',
            'content' => 'required',
        ]));
        $request['author'] = Auth::user()->id;
        $post = Post::create($request->all());
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function update(Request $request, $id){
        $request->validate(([
            'title' => 'required|max:255',
            'content' => 'required',
        ]));
        $post=Post::findOrFail($id);
        $request['author'] = Auth::user()->id;
        $post->update($request->all());
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    public function destroy($id){
        $post=Post::findOrFail($id);
        $post->delete();
        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }
}
