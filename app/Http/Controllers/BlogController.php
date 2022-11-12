<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\blog_details;

class BlogController extends Controller
{

    function __construct()
    {
        $this->middleware("auth");

    }
    
    function index(){

        $data = DB::table('blogs')
        ->join('blog_details','blogs.id','=','blog_details.blog_id')
        ->select('blogs.id','blogs.title','blogs.author','blogs.description','blogs.status','blog_details.blog')->get();
        
        return view('blogs/blogs',['blogs'=>$data]);
    }

    function addblog()
    {
        return view('blogs/addblog');
    }

    function saveblog(Request $req)
    {
        $blog = new Blog;
        $blogDetails = new blog_details;

        $userid = Auth()->user()->id;

        $blog->title = $req->title;
        $blog->author = $req->author;
        $blog->description = $req->description;
        $blog->status = 1;
        $blog->created_by = $userid;
        $blog->save();
        $blogId = $blog->id;

        $blogDetails->blog_id = $blogId;
        $blogDetails->blog = $req->blog;
        $blogDetails->save();
        
        return redirect()->route('blog')->with('success','Blog inserted successfully');

    }

    function updateblogstatus(Request $request,$id,$status){

        $blogDetails = new blog_details;

        if($status == '1'){
            $newstatus = 0;
        }else{
            $newstatus = 1;
        }

        DB::table('blogs')
                ->where('id', $id)
                ->update(array('status' => $newstatus));
        
        $blogDetails = $blogDetails::find($id);   
        $blogDetails->blog = 'Update for test';
        $blogDetails->save();
        //dump($blogDetails);exit;

        return redirect()->route('blog')->with('success','Status updated successfully');;        
    }
}
