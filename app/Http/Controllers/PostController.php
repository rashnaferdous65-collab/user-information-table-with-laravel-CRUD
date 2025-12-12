<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){

        return view('create');
    }

    public function ourfilestore(Request $request){

        $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable',
    ]);

  //upload image
    $imageName = null; 
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }


       //Add New Post
         $post = new Post;
         $post->name = $request->name;
         $post->description = $request->description;
         $post->image = $imageName; 
       

          $post->save();
  
          return redirect()->route('home')->with('success', 'Your Post Has Been Created Successfully!');
        
}

   public function edit($id){
     $post= Post::findOrFail($id);
        return view('edit', ['ourpost'=> $post]);

    }
   
   public function update($id, Request $request)
{
    // Validate input
    $data = $request->validate([
        'name'        => 'required',
        'description' => 'required',
        'image'       => 'nullable',
    ]);

    // Find post
    $post = Post::findOrFail($id);

    // Update basic fields
    $post->fill([
        'name'        => $data['name'],
        'description' => $data['description'],
    ]);

    // Handle image upload if exists
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post->image = $imageName;
    }

    // Save changes
    $post->save();

    return redirect()
        ->route('home')
        ->with('success', 'Your Post Has Been Updated Successfully!');
}


public function delete($id)
{
    $post = Post::findOrFail($id);

    if ($post) {
        $post->delete();
        flash()->success('Your Post Has Been Deleted!');
    }

    return redirect()->route('home');
}


}

 
//;->with('success', 'Your Post Has Been Deleted!')