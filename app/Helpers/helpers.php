<?php
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

    /**
     * Count Logged In User Posts
     */
    if (! function_exists('countUserPosts')) {
        function countUserPosts()
        {
            if($user = Auth::user()){
                return $user->posts()->count();
            }

        }
    }

    /**
     * Count Reported Post
     */
    if (! function_exists('reportedPosts')) {
        function reportedPosts()
        {
            if($user = Auth::user()){
                return $user->posts()->count();
            }
        }
    }


    if (! function_exists('currentMonthPosts')) {
        function currentMonthPosts()
        {
            $today = Carbon::now();
            $user = Auth::user();
            if($user = Auth::user()){
                return $user->posts()->whereBetween('created_at', [$today->startOfMonth(), $today->endOfMonth()])->count();

            }
        }
    }

    if (! function_exists('listCategories')) {
        function listCategories()
        {

        }
    }

    if (! function_exists('selectedTags')) {
        function selectedTags($post_id, $tag_id)
        {

            $selected_tags = DB::table('post_tag')->where('post_id', $post_id)->where('tag_id', $tag_id)->exists();

            return $selected_tags;
        }
    }

    if (! function_exists('nextPost')) {

          function nextPost($id){

            $next =  Post::find($id+1);

            if ($next){
                return $next;

            } else {

                return null;
            }

            return $next;

        }
    }

    if (! function_exists('previousPost')) {
          function previousPost($id){

            $previous =  Post::find($id-1);

            if($previous){

                return $previous;

            } else {

                return null;
            }

            return $previous;

        }
    }





