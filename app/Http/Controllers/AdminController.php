<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function post_page(){
        return view('admin.post_page');
    }
    function add_post(Request $request){
        $user=Auth()->user();
        $usertype=$user->usertype;
        $userid=$user->id;
        $name=$user->name;

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;

        $post->post_status = 'active';
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
        return redirect()->back()->with('message','post added successfully');


    }
    function show_Post()
    {
        $post = Post::all();
        return view('admin.show_post',compact('post'));
    }

    function delete_post($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','post deleted successfully');
    }

    function edit_post($id){

        $post=Post::find($id);
        return view('admin.edit_post',compact('post'));
    }

    function update_post(Request $request,$id){
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            request()->image->move('postimage', $imageName);
            $data->image=$imageName;
        }

        $data->save();
        return redirect()->back()->with('message','post updated successfully');

    }
    function accept_post($id){
        $post=Post::find($id);
        $post->post_status='active';
        $post->save();
        return redirect()->back()->with('message','post accepted successfully');

    }

    function reject_post($id){
        $post=Post::find($id);
        $post->post_status='pending';
        $post->save();
        return redirect()->back()->with('message','post rejected successfully');

    }

    public function adminHome()
    {
        return view('admin.adminhome'); // admin.adminhome view'i
    }
}
