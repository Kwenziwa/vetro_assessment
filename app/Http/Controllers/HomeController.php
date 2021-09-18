<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }


    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

        return view('welcome', compact('posts'));


    }

    public function details(Request $request)
    {
        $post = Post::find($request->id);
        $latest_posts = Post::orderBy('created_at', 'DESC')->where('id', '!=' , $request->id)->limit(4)->get();
         $categories = Category::withCount('posts')->limit(5)->get();
         $tags = Tag::all();

         if ($post){
            $selected_tags = DB::table('post_tag')->where('post_id', $post->id)->select('tag_id')->get();
            $selected_tags = json_decode(json_encode($selected_tags), true);


        }else{

            return view('error');
        }


        return view('home.detials', compact('post', 'tags', 'categories','selected_tags', 'latest_posts'));
    }
}
