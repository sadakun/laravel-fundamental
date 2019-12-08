<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts =  Post::latest()->get();
        $posts =  Post::orderBy('id', 'asc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('posts.create');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $input = $request->all();
        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['path'] = $name;
        }

        Post::create($input);
        // $file = $request->file('file');
        // echo "<br>";

        // echo $file->getFilename();
        // echo "<br>";

        // echo $file->getClientSize();
        // echo "<br>";

        // echo $file->getClientOriginalName();
        // echo "<br>";
        //
        // return $request->get('title');
        // $this->validate($request, [
        //     'title' => 'required|max:10'
        // ]);


        // Post::create($request->all());
        // return redirect('/posts');
        //or
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());
        //or
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::whereId($id)->first()->delete();
        return redirect('/posts');
    }
}
