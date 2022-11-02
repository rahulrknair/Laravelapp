<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    
    function index(){

        $data = User::all();
        return view('member/members',['members'=>$data]);
    }
}
