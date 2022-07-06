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


class facebookcontroller extends Controller
{
   
//for register
    public function index(){
        return view("register");
    }
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

        $user = new User();
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->birthday=$request->birthday;
        $user->gender=$request->gender;
        $user->password=Hash::make($request->password);
        $res = $user->save();
        
        if ($res) {
            return redirect('login')->with('success','You have successfully registerd');
        }
         else {
             return back()->with('fail','Something went wrong');
         }
        
    
    }
// for login
    public function login(){
        return view("login");
    }

    public function loginf(Request $request){
        $request->validate(
            [
                
                'email' => 'required|email',
                'password' => 'required',
                
            ]
        );
        $user = User::where('email','=',$request->email)->first();
        if($user){
           // $user1 = User::where('password','=',$request->password)->first();
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('loginId',$user->id);
                return redirect('home');
               
                
            }
            else{
                return back()->with('fail','Invalid password');
                 
            }
        }
        else
        {
            return back()->with('fail','No account found for this email');
            
        }
        

   
    }
// for home page
     public function home(){
         
         $posts = Post::all()->sortByDesc('updated_at');
         if(session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
        }
         return view('home', ['posts' => $posts,'data' => $data]);
     }
//for posts

    public function post(){
        $posts = Post::all()->sortByDesc('updated_at');
        if(session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
        }

        return view('post', ['posts' => $posts,'data'=>$data]);
        // return $posts;
    }
    
   
    
    public function createpost(){
        return view('createpost');
    }
    public function store(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'text'  => 'required',
                'image'  => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
                
            ]
        );

    $newImageName= time().'.'.$request->image->extension();
    
    
    $request->image->move(public_path('images'),$newImageName);
    
    $post = new Post();
    $post->title=$request->title;
    $post->text=$request->text;
    $post->image_path=$newImageName;
    
    $data = array();
    if(session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
            $post->user_id = $data->id;
    }
    
    $res = $post->save();
    if ($res) {
        return redirect('post')->with('success','You have successfully registerd');
    }
     else {
         return back()->with('fail','Something went wrong');
     }


    

    }
    
   function delete($id)
    {
        $post= Post::find($id);
        $post->delete();
        return back()->with('post deleted','post has been deleted successfully');
    }
    function edit($id)
    {
       
        $post = Post::find($id);
        return view('edit')->with('post', $post);
        
    } 
    public function update(Request $request,$id){
        //
        $post = Post::find($id);
        
        $post->title= $request->title;
        $post->text = $request->text;
        if($request->image){
            $post->image_path = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),time().'.'.$request->image->extension());
            }
       
        $post->save();
        return redirect('post')->with('flash_message', 'Post Updated!');
        
        }
//for profile

    public function profile(){
    
        $posts = Post::all()->sortByDesc('updated_at');
        
        $items = Profile::all();
        if(session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
        }
       
         return view('profile', ['posts' => $posts,'items' => $items,'data' => $data]);

    }
    public function About(Request $request){
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
    $item = new Profile();
    $item->work=$request->work;
    $item->study=$request->study;
    $item->college=$request->college;
    $item->currentlocation=$request->currentlocation;
    $item->permanentlocation=$request->permanentlocation;
    $item->join=$request->join;
    // $post->user_id=$request->user()->id;
    $data = array();
    if(session()->has('loginId')){
            $data = User::where('id','=',session()->get('loginId'))->first();
            $item->user_id2 = $data->id;
    }
    
    $res = $item->save();
    if ($res) {
        return redirect('profile')->with('success','You have successfully registerd');
    }
     else {
         return back()->with('fail','Something went wrong');
     }
    
    }
    public function aboutget()
    {
        $items = Profile::all();
        return view('about', ['items' => $items]);
        
    }
    function editabout($id)
    {
        
        $item = Profile::find($id);
        return view('editabout')->with('item', $item);
    } 
    public function updateabout(Request $request,$id){
        //
        $item = Profile::find($id);
        $item->work= $request->work;
        $item->study = $request->study;
        $item->college = $request->college;
        $item->currentlocation = $request->currentlocation;
        $item->permanentlocation = $request->permanentlocation;
        $item->join = $request->join;
        
        $item->save();
        return redirect('profile')->with('flash_message', 'details Updated!');
        }
    function loginUser($user_id){
       
        return Post::where('user_id','like','%'.$user_id.'%')->get();
    }
//for logout

    public function logout(){
        if(session()->has('loginId')){
          session()->pull('loginId');
         return redirect('login');
      }
  }
}
