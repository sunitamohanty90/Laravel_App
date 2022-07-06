<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .dropbtn {
  /* background-color: #04AA6D; */
  color: black;
  /* padding: 16px; */
  /* font-size: 16px; */
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 80px;
  box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: blue;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #ddd;}
    </style>
</head>
<body class="bg-gray-200 ">
    <nav class="bg-white dark:bg-dark-second h-max md:h-14 w-full shadow flex flex-col md:flex-row items-center justify-center md:justify-between fixed top-0 z-50 border-b dark:border-dark-third">
        <!-- left -->
        <div>
           
        </div>
        <!-- middle -->
        <div>
            <ul class="flex w-full lg:w-max items-center justify-center">
                <li><a href="home"class="w-full text-xl py-2 px-3 xl:px-4 cursor-pointer text-center  text-blue-500 ">Home</a></li>
                <li><a href=""class="w-full text-xl py-2 px-3 xl:px-4 cursor-pointer text-center  text-blue-500 ">Watch</a></li>
                <li><a href=""class="w-full text-xl py-2 px-3 xl:px-4 cursor-pointer text-center  text-blue-500 ">Marketplace</a></li>
                <li><a href=""class="w-full text-xl py-2 px-3 xl:px-4 cursor-pointer text-center  text-blue-500 ">Groups</a></li>
                <li><a href=""class="w-full text-xl py-2 px-3 xl:px-4 cursor-pointer text-center  text-blue-500 ">Gamings</a></li>
            </ul>
        </div>
        <!-- right -->
        <div>
           <ul class="flex items-stretch" >
               
               <div class="dropdown">
                   <button class="dropbtn text-blue-500 hover:text-black">Menu</button>
                   <div class="dropdown-content ">
                     <a class="text-blue-500 hover:text-black" href="post">Post</a>
                     <a class="text-blue-500 hover:text-black" href="">Messanger</a>
                     <a class="text-blue-500 hover:text-black" href="">story</a>
                   </div>
               </div>
               
               
               <div class=" dropdown">
                   <button class="dropbtn text-blue-500 hover:text-black">Profile</button>
                   <div class="dropdown-content ">
                     <a class="text-blue-500 hover:text-black" href="profile">See your profile</a>
                     <a class="text-blue-500 hover:text-black" href="logout">Logout</a>
                     
                   </div>
               </div>
           </ul>
        </div>
    </nav>

    <!-- Posts -->
    <div class="mt-16">
    @foreach ($posts as $post)
    <div class="flex justify-center contents-center">
    <div class="bg-white box-border p-4 border-8  flex flex-col p-4 rounded-xl text-center w-96 h-96 " >
        
    
       
         <div> 
               <span class="text-gray-500 text-sm ">
                  <span class="font-bold italic text-gray-800">{{ $post->user->email }}</span>,{{date('jS M Y',strtotime($post->updated_at))}}
               </span>
              <h2 class="text-xl ">{{ $post->title }}</h2> 
         </div>
         <div class="flex justify-center contents-center"> 
              
              <img class="bg-gray box-border h-64 w-64  border-2 " src="{{ asset('images/' . $post->image_path) }}" alt="img" >
               
         </div>
         <p class="text-md text-gray-700 pt-2 pb-2 font-light">{{ $post->text}}</p>
         
         @if($data->id == $post->user_id)
         <div class="dropdown flex content-end">
                   <button class="dropbtn text-blue-500 hover:text-black">...</button>
                   <div class="dropdown-content ">
                     <a class="text-blue-500 hover:text-black" href="edit/{{$post->id}}">Edit</a>
                     <a class="text-blue-500 hover:text-black" href="delete/{{$post->id}}">Delete</a>
                   </div>
               </div>
          @endif 
    </div>
    </div>
    @endforeach
    </div>
    
  </nav>
</body>
</html>