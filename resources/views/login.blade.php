<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook in Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-300" style="font-family: inherit;">

<div class="mt-36 mx-auto flex justify-center items-center ">
    <div class="left w-1/3 mx-20">
            
                <h1 class="text-blue-600 text-5xl font-weight-800 italic">INNOVATION</h1>
                
            
                <h3 class="text-2xl italic">Creating something new which can connect you with the people in your life</h3>
            
    </div>
    <div class="right flex flex-col bg-white p-8 rounded-xl">
           <form action=" {{ route('loginn') }} " method="POST">
             @csrf
             @if(Session::get('success'))
               {{Session::get('success')}}
             @endif
             @if(Session::get('fail'))
               {{Session::get('fail')}}
             @endif

           
                <div class="" >
                   <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="email" name="email" placeholder="Email or phonenumber" value="{{ old('email')}}">
                </div>
                <div class="" >
                   <span class="px-4 h-4 " style="color:red">@error('email'){{$message}}@enderror</span>
                </div>
              
                <div class="">
                   <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="password" name="password" placeholder="Password" value="{{ old('password')}}">
                </div>
                <div class="">
                   <span class="px-4 h-4 " style="color:red">@error('password'){{$message}}@enderror</span>
                </div>
                
                <button class=" bg-blue-600 hover:bg-blue-700 text-white my-2 py-3 rounded-xl w-72 text-xl" type="submit" >Log In</button>
                
                
                <div class="flex justify-center items-center">
                <a class="bg-green-600 hover:bg-green-700 text-white my-2 py-3 rounded-xl w-72 text-xl text-center" href="register" >Create an account</a>
                </div>
             
           </form>
    </div>
</div>
</body>
</html>