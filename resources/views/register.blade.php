<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-300" style="font-family: inherit;">
<div class="mt-16 mx-auto flex justify-center items-center ">  
   <div class="flex flex-col bg-white p-6 rounded-xl">
      <form action="{{url('/')}}/register" method="post">
         @csrf
         @if(Session::get('success'))
           {{Session::get('success')}}
         @endif
         
         @if(Session::get('fail'))
              {{Session::get('fail')}}
         @endif
          
            <div class="container">
                  <h1 class="text-blue-600 text-3xl font-weight-800">Sign Up</h1>
                  
                  
             <div class="flex flex-col p-4 rounded-xl">
                <div class="">
                    <!-- <label for="">Firstname</label> -->
                    <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="text" name="firstname" placeholder=" firstname" value="{{ old('name')}}"> 
                </div>
                <div>
                    <span style="color:red">@error('firstname'){{ $message }}@enderror</span>
                </div>    
                <!-- </div> -->
                <!-- <div class=""> -->
                    <!-- <label for="">Lastname</label> -->
                <div>
                    <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="text" name="lastname" placeholder=" lastname" value="{{ old('name')}}"> 
                </div>
                <div>
                    <span style="color:red">@error('lastname'){{ $message }}@enderror</span>   
                </div>
                
                <div class="">
                    <!-- <label for="">Email or phone number</label> -->
                    <input  class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl w-fit" name="email" placeholder="email" type="text" value="{{ old('name')}}" > 
                </div>
                <div>
                    <span  style="color:red">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="">
                    <!-- <label for="birthday">Date of Birth</label> -->
                    <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="date" id="birthday" name="birthday"> 
                </div>
                <div>
                    <span  style="color:red">@error('birthday'){{$message}}@enderror</span>
                </div>
                <div class="">
                    <!-- <label for="gender">Gender</label> -->
                    
                    <input type="radio" name="gender" value="male"> 
                    <label for="male">Male</label>
                    
                    <input type="radio" name="gender" value="female"> 
                    <label for="female">female</label>
                    <span  style="color:red">@error('gender'){{$message}}@enderror</span>
                </div>
                
                <div class="">
                    <!-- <label for="">Password</label> -->
                    <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="password" name="password" placeholder="new password" value="{{ old('password')}}"> 
                </div>
                <div>
                    <span  style="color:red">@error('password'){{$message}}@enderror</span>
                </div>
               
                <div><button class=" bg-blue-600 hover:bg-blue-700 text-white my-2 py-1 rounded-xl w-72 " type="submit" >sign up</button></div>
  
                <div class="flex justify-center items-center"><a class="bg-green-600 hover:bg-green-700 text-white my-2 py-1 rounded-xl w-72 text-center" href="login">I already have an account</a></div>
             </div>  
            </div>
             
        </form>
    </div>
</div>   
</body>
</html>