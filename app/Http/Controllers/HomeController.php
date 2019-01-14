<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'categories'])->paginate(10);
        $categories = Category::get(['title', 'id']);
        $users = User::get(['name', 'id']);
        return view('welcome', compact('posts', 'categories', 'users'));
    }
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }
    public function ajaxRequestPost(Request $request)
    {
        $cat_id = $request->category_id;
        $user_id = $request->user_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $output="";
       //$posts = Post::with(['user', 'categories'])->where('user_id', '=', $user_id)->get();
       // $post_ids = DB::table('category_post')->where('category_id', '=', $cat_id)->value('post_id');
       // $posts = DB::table('posts')->where('id', '=', $post_id)->get();
     $posts = Post::with(['user', 'categories'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->where('user_id', '=', $user_id)->get();
    // $posts = Post::with(['user', 'categories'])->whereHas('categories', function($q){$q->where('id', "=", $cat_id);})->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->where('user_id', '=', $user_id)->get();
    // $posts = Post::with(['user', 'categories'])->where('categories->id', '=', $cat_id)->get();
        if($posts)
        {       
        foreach ($posts as $key => $post) {
 
            $output.='<tr>'.
             
            '<td>'.$post->title.'</td>'.
             
            '</tr>';
             
            }
        }else{
            $output = "hello world";
        }
        //$posts = Post::all()->where('category_id', '=', $cat_id)->paginate(10);
        //$input = request()->all();
        //$output = "Hello World";
        //print_r($input);
       // return response()->json(['success'=>'Got Simple Ajax Request.']);
       return Response($output);
        //return response()->json(['input'=> 'Got simple ajax result']);
    }
}
