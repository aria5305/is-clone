<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create(){

        return view('posts.create');

    }
    public function store(Request $request){

        $data = request()->validate([
            'caption'=>'required', 
            'image'=>'required | image',
            'user_id'=> ''
        ]); 


        // \App\Post::create(['caption' => $request->caption,
        //              'image'=> $request->image, 
        //             'user_id' => auth()->user()->id]
        // );
    

        $imagePath = request('image') -> store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();


        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image' =>$imagePath, 
            
        ]); 


       return redirect('/profile/' . auth()->user()->id);

     
    }

    public function show(\App\Post $post){
        // dd($post);
        return view('posts.show', compact('post'));
    }


}
