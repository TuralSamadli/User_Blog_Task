<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;




class BlogController extends Controller
{

    public function index()
    {
        $userblog = DB::table('user')

            ->join('blog', 'user_id', "=", "blog.user_id")
            ->whereColumn('user.id', 'blog.user_id')

            ->get();

        return view('blog', compact('userblog'));
    }
    
    public function delete(Request $request){
if(Gate::allows('admin-only')){

        if(Blog::destroy($request->id)){
            return "ok";
        }
        else{
            return "no";
        }
    }
}
}
