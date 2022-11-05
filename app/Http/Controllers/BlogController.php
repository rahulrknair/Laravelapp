<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class BlogController extends Controller
{

    function __construct()
    {
        $this->middleware("auth");

    }
    
    function index(){

        $data = DB::table('blogs')->select('id','title','author','description','status')->get();
        
        return view('blogs/blogs',['blogs'=>$data]);
    }

    function addblog()
    {
        return view('blogs/addblog');
    }

    function saveblog(Request $req)
    {
        $blog = new Blog;

        $userid = Auth()->user()->id;

        $blog->title = $req->title;
        $blog->author = $req->author;
        $blog->description = $req->description;
        $blog->status = 1;
        $blog->created_by = $userid;
        $blog->save();

        return redirect()->route('blog');

    }
}
