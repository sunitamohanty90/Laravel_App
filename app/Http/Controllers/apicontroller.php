<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EmployeeResource;
use Hash;
use Session;
use Validator;


class apicontroller extends Controller
{



//for register
   
   public function register(Request $request){
       $request->validate(
           [
               'firstname' => 'required',
               'lastname'  => 'required',
               'email' => 'required|email|unique:users',
               'birthday'  => 'required|date',
               'gender'  => 'required',
               'password' => 'required',
               
           ]
       );

       $user = User::create([
           'firstname' => $request->firstname,
           'lastname' => $request->lastname,
           'email' => $request->email,
           'birthday'=>$request->birthday,
           'gender'=>$request->gender,
           'password'=>Hash::make($request->password),
           // 'password' => bcrypt($request->password)
       ]);
       $token = $user->createToken('apitoken')->accessToken;

       return response()->json(['user' => $user,'token' => $token], 200);
   
   }
  

   //for login
   public function login(){
    $user = User::all()->sortByDesc('updated_at');
    return $user;
   }
   public function loginf(Request $request){
       
    if(Auth::attempt([
        'email'=> $request->email,
        'password'=> $request->password
    ])){
        $user = Auth::user();
        $token = $user->createToken('apitoken')->accessToken;

        return response([ 'user' => Auth::user(), 'token' => $token]);
    }
    else{
        return response()->json(['error'=>'Unauthorized Access'],202);
    }
  
   }


//for posts
   public function post(){
       $posts = Post::all()->sortByDesc('updated_at');
       if(session()->has('loginId')){
           $data = User::where('id','=',session()->get('loginId'))->first();
       }

       // return view('post', ['posts' => $posts,'data'=>$data]);
       return $posts;
   }

   public function store(Request $request){
    $request->validate(
        [
            'title' => 'required',
            'text'  => 'required',
            'image'  => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]
    );

     $newImageName= time().'.'.$request->image->extension();
     
     $request->image->move(public_path('images'),$newImageName);
     
     $post = new Post();
     $post->title=$request->title;
     $post->text=$request->text;
     $post->image_path=$newImageName;
    
     
    $user = Auth::user();
    
    $post->user_id = $user->id;
    $post->email = $user->email;

     $res = $post->save();
     return $post;
    }


   function delete($id)
   {
    $post = Post::find($id);
    $loginId = Auth::user();
    if($loginId->id == $post->user_id){
        $result = $post->delete();
        return ['result'=>'Your post has been deleted'];
    }
    
       
   }
   function getPosts(){
    $post = Post::all();
    
    return $post;
   }

   function getpost($id)
   {
       $post = Post::find($id);
       return $post;
   } 
   public function update(Request $request,$id){
       
    
    $post = Post::find($id);
    
    $loginId = Auth::user();
        if($loginId->id == $post->user_id){
            // $input = $request->all();
            // $post->update($input);
            $post->title= $request->title;
            $post->text = $request->text;
            if($request->image){
                $post->image_path = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'),time().'.'.$request->image->extension());
                }
            $post->save();
            return [$post,'Your posts have been updated successfully'];
        }
   
    }

    function loginUser($user_id){
      
        return Post::where('user_id','like','%'.$user_id.'%')->get();
    }

//for profile

  
   public function createabout(Request $request){
       $request->validate(
           [
               'work' => 'required',
               'study'  => 'required',
               'college' => 'required',
               'currentlocation'  => 'required',
               'permanentlocation'  => 'required',
               'join' => 'required|date',
               
           ]
       );
   $post = new Profile();
   $post->work=$request->work;
   $post->study=$request->study;
   $post->college=$request->college;
   $post->currentlocation=$request->currentlocation;
   $post->permanentlocation=$request->permanentlocation;
   $post->join=$request->join;
   
    $user = Auth::user();
    $post->user_id2 = $user->id;
    $post->email = $user->email;

   $res = $post->save();
   return $post;
   
   }

   public function aboutget()
   {
       $posts = Profile::all();
      
       return $posts;
   }
   
   
   public function updateabout(Request $request,$id){
       

    $post = Profile::find($id);
    $loginId = Auth::user();
        if($loginId->id == $post->user_id2){
            $post->work=$request->work;
            $post->study=$request->study;
            $post->college=$request->college;
            $post->currentlocation=$request->currentlocation;
            $post->permanentlocation=$request->permanentlocation;
            $post->join=$request->join;
            $post->save();
            return [$post,'Your posts have been updated successfully'];
        }
   
      
    }
    function deleteabout($id){
        $about = Profile::find($id);
        $loginId = Auth::user();
        if($loginId->id == $about->user_id2){
            $result = $about->delete();
            return ['result'=>'Your about has been deleted'];
        }
        else{
            return ['result'=>"You can't delete other's details"];
        }
    }

    function loginProfile($user_id2){
        return Profile::where('user_id2','like','%'.$user_id2.'%')->get();
    }

//for logout
public function logout(Request $request){
    $token = $request->user()->token();
        $token->revoke();
        return ['message'=> 'You have successfully logout!!'];
  }



  

   
   
}
