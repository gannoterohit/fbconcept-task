<?php

namespace App\Http\Controllers;

use App\Models\like;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

     public function post (){

        return view('post');
     }
     public function post_image(Request $request){

            $image=$request->image;
            $myimage = null;
            $file_path = 'assets/img/post/'; 
            if (!empty($image)) {
                $myimage = time() . $image->getClientOriginalName();
                $image->move(public_path($file_path), $myimage);
            }   
            //  dd($myimage); 
            if($myimage==null){
                return redirect()->to('post');
            }
            $post_image = new post(); 
            $post_image->image =$myimage;
            $post_image->like_count=0;
            $post_image->user_id=Session::get('userid');

            $post_image->save();
            return redirect()->to('home');
            
        }

        public function get_post(request $request){

            $data = post::with('getuser')->orderBy('like_count', 'desc')
            ->get();            

        
         
        return response()->json(['data' => $data]);

        }

        public function home (){

            return view('home');
        }

        public function post_like(request $request){

            $form_data=$request->all();
            $id=$form_data['image_id'];
            $like =  new like ();

            $like->user_id=Session::get('userid');
            $like->image_id=$id;
             $like->save();

             $total_count= like::where('image_id' , $id)->count('id');
            //  dd($total_count);
            $post = post::find($id);

            $post ->like_count=$total_count;
             $post->save();

             
        return response()->json(['post' => $post]);


            
        }


    }