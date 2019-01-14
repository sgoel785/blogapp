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

    public function search(Request $request)
    {
            if($request->ajax())
                    {
                            $output="Hello";
                    }
            return Response($output);
    }
}
