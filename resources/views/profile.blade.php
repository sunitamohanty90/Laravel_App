<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
<body class="bg-gray-200" style="font-family: inherit;">
<div class="flex justify-center items-center">
  <div class="w-3/4 ">
            <div class="flex justify-center items-center">
                <img class="object-none object-center w-1/2 h-1/2 rounded-full "  src="https://www.teahub.io/photos/full/134-1347618_background-natural-hd-png.jpg" alt="cover photo">
                <div class="">
                  <a href="">edit</a>
                </div>
            </div>
            
            <div class=" ">
               <h1 class="text-3xl px-2 py-2 ">{{ $data->email}}</h1>
               
            </div>
            
            
            <hr class=" border-t border-black-300">
    
            <div class="bg-white">
                <ul class="flex flex-row space-x-8 ">
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 border-b-1" href="post">Posts</a>
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 hover:border-b-2 hover:border-blue-300" href="about">About</a>
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 hover:border-b-2 hover:border-blue-300" href="">Frnds</a>
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 hover:border-b-2 hover:border-blue-300" href="">Photos</a>
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 hover:border-b-2 hover:border-blue-300" href="">videos</a>
                    <a class="text-blue-700 italic hover:text-blue-900 pb-1 hover:border-b-2 hover:border-blue-300" href="">More</a>
                </ul>
            </div>
       <div class="float-root">
               <div class="float-right">
                   <h1 class=" text-blue-600 text-3xl font-weight-800 text-center">Posts</h1>
                   
                @foreach ($posts as $post)
                 @if($data->id == $post->user_id)
                <div class="flex ">
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
                     
                     <div class="dropdown flex content-end">
                               <button class="dropbtn text-blue-500 hover:text-black">...</button>
                               <div class="dropdown-content ">
                                 
                                 <a class="text-blue-500 hover:text-black" href="edit/{{$post->id}}">Edit</a>
                                 <a class="text-blue-500 hover:text-black" href="delete/{{$post->id}}">Delete</a>
                               </div>
                           </div>
                       
                </div>
                </div>
                 @endif
                @endforeach
                </div>
           <div class="float-left">
               @foreach($items as $item)
               @if($data->id == $item->user_id2)
                     <div class="bg-white box-border h-96 w-96 p-4 border-8">
                        <div>
                            <h1 class="text-center text-blue-700">Intro</h1>
                        </div>
                       <div class="flex flex-col space-y-6">
                           <div>{{ $item->work}}</div>
                           <div>{{ $item->study}}</div>
                           <div>{{ $item->college}}</div>
                           <div>{{ $item->currentlocation}} </div>
                           <div>{{ $item->permanentlocation}} </div>
                           <div>{{ $item->join}}</div>
                           <a class="bg-blue-500 hover:bg-blue-700 text-white my-2 py-2 rounded-xl text-sm text-center" href="editabout/{{$item->id}}">Edit Details</a>
                        </div>
                     </div>
                     @endif
                 @endforeach
                       <div class="bg-white box-border h-72 w-96 p-4 border-8">
                           <div>Photos</div>
                       </div>
                       <div class="bg-white box-border h-72 w-96 p-4 border-8">
                           <div>Frnds</div>
                       </div>
            </div>
     </div>
   </div>
</div>
</body>
</html>