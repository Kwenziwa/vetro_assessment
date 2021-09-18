<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::with('category')->where('user_id', auth()->id())->paginate(10);
        return view('users.posts.list', compact('posts'));
    }

    public function create() {

        $categories = Category::all();
        $tags = Tag::all();
        return view('users.posts.create', compact(['categories','tags']));

     }

     public function store(CreatePostRequest $request){

        $tags = explode(',', implode(',', $request->tags));

        if($request->has('image')){
            $filename = time().'-'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'image' => $filename ?? null,
            'post' => $request->post,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);

        foreach($tags as $a_tag){

          $tag = Tag::firstOrCreate(['name'=> $a_tag]);
          $post->tags()->attach($tag);

        }

        return redirect()->route('list-posts')->withSuccess('Post created successfully');
     }

     public function edit(Request $request)
     {
        $post = Post::find($request->id);

        $this->authorize('view', $post);

         $categories = Category::all();
         $tags = Tag::all();
         $selected_tags = DB::table('post_tag')->where('post_id', $post->id)->select('tag_id')->get();
         $selected_tags = json_decode(json_encode($selected_tags), true);

        //dd($selected_tags);

         return view('users.posts.edit', compact('post', 'tags', 'categories','selected_tags'));
     }

     public function show(Request $request){

        $post = Post::find($request->id);

        $this->authorize('view', $post);

         $categories = Category::all();
         $tags = Tag::all();
         $selected_tags = DB::table('post_tag')->where('post_id', $post->id)->select('tag_id')->get();
         $selected_tags = json_decode(json_encode($selected_tags), true);
         return view('users.posts.show', compact('post', 'tags', 'categories','selected_tags'));

     }

     public function update(EditPostRequest $request, Post $post)
    {
        $post = Post::find($request->id);
        $tags = explode(',', implode(',', $request->tags));
        $this->authorize('update', $post);

        if ($request->has('image')) {
            Storage::delete('public/uploads/' . $post->image);

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename, 'public');
        }

        $post->update([
            'title' => $request->title,
            'image' => $filename ?? $post->image,
            'post' => $request->post,
            'status' => $request->status,
            'category_id' => $request->category
        ]);

        $newTags = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        return redirect('list-posts')->withSuccess('Post Update successfully');
    }


     public function destroy(Request $request)
     {

         $post = Post::find($request->id);
         $this->authorize('delete', $post);

         if ($post->image) {
             Storage::delete('public/uploads/' . $post->image);
         }

         $post->tags()->detach();
         $post->delete();

         return redirect()->route('list-posts')->withSuccess('Post created successfully');
     }

}
