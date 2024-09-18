<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{


    function index()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $post=Post::where('post_status','active')->get();


            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
            } else if ($usertype == 'admin') {
                return view('home.homepage', compact('post'));
            }
            return redirect()->back();

        }
    }

    function homePage(){
        $post=Post::where('post_status', 'active')->get();
        return view('home.homepage',compact('post'));
    }

    function post_details($id){
        $post=Post::find($id);
        return view('home.post_details',compact('post'));
    }

    function create_post()
    {
return view('home.create_post');
    }
    function user_post(Request $request){
        $user=Auth()->user();
        $usertype=$user->usertype;
        $userid=$user->id;
        $name=$user->name;

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        $post->post_status = 'pending';
        $post->name = $name;
        $post->usertype = $usertype;
        $post->user_id = $userid;

        $image=$request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('postimage', $imageName);
            $post->image=$imageName;
        }

        $post->save();

        Alert::success('Congrats','Post upload to data successfully');
        return redirect()->back()->with('message','You have added the post successfully');
    }

    function my_post(){
        $user=Auth::user();
        $userId=$user->id;
        $data=Post::where('user_id',$userId)->get();

        return view('home.my_post',compact('data'));
    }
    function my_post_del($id){
        $postDel=Post::find($id);
        $postDel->delete();
        return redirect()->back()->with('message','post deleted successfully');
    }

    function update_my_post($id)
    {
        $post_update = Post::find($id);
        return view('home.update_my_post', compact('post_update'));
    }
    function update_data(Request $request,$id){


        $save_post=Post::find($id);
        $save_post->title = $request->title;
        $save_post->description = $request->description;

        $image_update=$request->image;
        if($image_update){
            $imageName_update = time().'.'.$image_update->getClientOriginalExtension();
            request()->image->move('postimage', $imageName_update);
            $save_post->image=$imageName_update;
        }

        $save_post->save();


        return redirect()->back()->with('message','You have updated the data successfully');
    }
    function about_details()
    {
        return view('home.about_details');
    }
    function all_posts(){
        $post=Post::where('post_status','active')->get();
        return view('home.all_posts',compact('post'));
    }

}
