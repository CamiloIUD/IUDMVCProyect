<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index()
    {
        $posts = Http::get('http://localhost:8000/api/posts')->json();
        return view('web.index', ['posts' => $posts]);
    }

    public function detail($id)
    {
        $post = Http::get("http://localhost:8000/api/posts/$id")->json();
        return view('web.detail', ['post' => $post]);
    }

    public function post_category($category)
    {
        $posts = Http::get("http://localhost:8000/api/posts?category=$category")->json();
        return view('web.index', ['posts' => $posts]);
    }

    public function contact()
    {
        return view('web.contact');
    }
}
