<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\post;

use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); 
    }
    
    public function index()
    {
        $allPosts = post::paginate(12);
        
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
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
        $post->category_id=$data['category_id'];
        
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
    public function edit(post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $data = $request->all();       

        // $data['brand_new'] = key_exists('brand_new', $data) ? true: false;
        // $car->update($data);  // update = fill + save
        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->cover = $data['cover'];
        $post->data = $data['data'];
        $post->category_id=$data['category_id'];
        $post->save();
        //$this->fillAndSavePost($post, $data);

        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index');  
    }
    // private function fillAndSavePost(Book $book, Request $request) {

    //     $data = $request->all(); // data ?? un array
    //     $post->title = $data['title'];
    //     $post->author = $data['author'];
    //     $post->cover = $data['cover'];
    //     $post->data = $data['data'];
    // }
}
