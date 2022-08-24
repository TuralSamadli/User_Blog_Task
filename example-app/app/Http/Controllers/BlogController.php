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
    
   

       public function edit(){
     $userblog = DB::table('user') ->join('blog', 'user_id', "=", "blog.user_id")->whereColumn('user.id', 'blog.user_id')->get();
    return view('edit',compact('userblog'));
       }

      public function update(Request $request){
        $userblog = DB::table('user')

        ->join('blog', 'user_id', "=", "blog.user_id")
        ->whereColumn('user.id', 'blog.user_id')->update([
            'title'=>$request->title,
            'description'=>$request->description,

        ]);
        if($userblog){
    return redirect()->route('blog.index')->with('success','Updated successfully');
        }
       return redirect()->route('blog.index')->with('error','Someting wrong happened');
      }    

      public function delete(Request $request){ 
        $userblog = DB::table('user')

        ->join('blog', 'user_id', "=", "blog.user_id")
        ->whereColumn('user.id', 'blog.user_id')->update([
            'is_deleted'=>1

        ]);
        if($userblog){
            return "ok";
        }
        else{
            return "no";
        }
        }
}
