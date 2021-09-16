<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = post::all();
        
        //chiamato il view posts.index perche index.blade.php si trova dentro la cartella posts(creata da me) su view 
        return view('posts.index',compact('allPosts'));
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
        $request->validate([
            'cover' => 'url'
        ]);

        $data = $request->all(); // ritorna tutti i valori del form in un array associativo


        /*
        if(key_exists('brand_new', $data)) {
            $brand_new = true;
        } else {
            $brand_new = false;
        }
        */

        $post = new post();
    
        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->cover = $data['cover'];
        $post->data = $data['data'];
        
        //$post->brand_new = key_exists('brand_new', $data) ? true: false;
        $post->save();  // salva nel database
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        

        return view('posts.show',compact('post'));
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
    }
}
