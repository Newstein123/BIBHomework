<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Request $request) {

    
   
        // $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        //         ->select('posts.*', 'users.name as author')
        //         ->orderBy('id', 'desc')
        //         ->paginate(5);
        $posts =Post::where('title', 'like', '%'. $request->search. '%')->Paginate(5);
        
        return view('posts.index', compact('posts'));
    }

    public function create() 
    {
        return view('posts.create');
    }

    public function store(PostRequest $request) {

     
// $request->validate([
//     'title' => 'required',
//     'body' => 'required|min:5'
// ], [
//     'title.required' => "ခေါင်းစည်းလိုသည်။", 
//     'body.required' => "ကိုထည်လိုသည်",
//     'body.min' => "အနည်းဆုံးစာလုံးရေငါးလုံးရှိရမည်"
// ]);
        // $post = new Post();
        // $post -> title = $request-> title;
        // $post -> body = $request->body;
        // $post -> created_at = now();
        // $post -> updated_at = now();
    
        // $post -> save();

        // session()->flash('success', 'A post was created successfully');
    
        // return redirect('/posts');

        post::create([
            'title' => $request->title,
                'body' => $request->body,
                'user_id'=> auth()->id()
        ]);

        session()->flash('success', 'A post was created successfully');
    
        return redirect('/posts');
    }

    public function show($id) {
        // $post = Post::find($id);

        $post = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name as author')
        ->where('posts.id', $id)
        ->first();

        return view('posts.show', compact('post'));
    }

    public function edit($id) 
    {
       $post = Post::find($id);
       return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id) {
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5',
        // ],[

        // ]);
       $post = Post::find($id);

        // $post -> title = $request->title;
        // $post -> title = $request-> body;
        // $post -> updated_at = now();
        // $post -> save();
        

        $post->update($request->only(['title', 'body']));

        return redirect('/posts')->with('success', 'A post was edited successfully');
    }

    public function destroy($id) {
        Post::destroy($id);  
          
        return redirect('/posts')->with('success', 'A post was deleted successfully');   
    }
}



