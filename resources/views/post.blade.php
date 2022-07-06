<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="" style="font-family: inherit;">
    <div class="flex justify-center contents-center">
        <h1 class="text-blue-600 text-3xl font-weight-800">Posts</h1>
    </div>
    <a class="bg-blue-600 hover:bg-blue-700 text-white my-2 py-1 px-2 rounded-xl w-72 text-center text-sm" href="createpost">Create post</a>
   
    @foreach ($posts as $post)
    @if($data->id == $post->user_id)
    
    <div class="bg-white box-border p-4 border-8 flex justify-center contents-center flex flex-col p-4 rounded-xl text-center " >
        
    
        <!-- <div class="flex justify-center contents-center"> -->
         <div> 
               <span class="text-gray-500 text-sm ">
                  <span class="font-bold italic text-gray-800">{{ $post->user->email }}</span>,{{ date('jS M Y',strtotime($post->updated_at)) }}
               </span>
              <h2 class="text-xl ">{{ $post->title }}</h2> 
         </div>
         <div class="flex justify-center contents-center"> 
              
              <img class="bg-gray box-border h-64 w-64  border-2 " src="{{ asset('images/' . $post->image_path) }}" >
               
         </div>
         <p class="text-md text-gray-700 pt-2 pb-2 font-light">{{ $post->text}}</p>
         <span class="float-right">
               <a class="text-blue-700 italic hover:text-blue-900 pb-1 border-b-2"href="edit/{{$post->id}}">Edit</a>
               <a class="text-blue-700 italic hover:text-blue-900 pb-1 border-b-2"href="delete/{{$post->id}}">Delete</a>
         </span>
           
    </div>
    
    @endif
    @endforeach
</body>
</html>