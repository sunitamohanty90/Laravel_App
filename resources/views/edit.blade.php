<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpost</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-300" style="font-family: inherit;">
<div class="flex justify-center items-center">  
   <div class="flex flex-col bg-white p-8 rounded-xl">
       
      <form action="{{ route('postupdate', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
         @csrf
         @if(Session::get('success'))
           {{Session::get('success')}}
         @endif
         
         @if(Session::get('fail'))
              {{Session::get('fail')}}
         @endif
        <div>
          <h2 class="text-blue-600 text-3xl font-weight-800">edit Post</h2>
          
            <div class="flex flex-col p-4 rounded-xl">

                 <label for="title">Title</label>
                 <input  class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" type="text" name="title" placeholder="Title.." value="{{ $post->title }}" >
                 <span class="px-4 h-4 " style="color:red">@error('title'){{$message}}@enderror</span>
              
                 <label for="text">Text</label>
                 <textarea class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="text" placeholder="Description.."  value="{{ $post->text }}"></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('text'){{$message}}@enderror</span>

                 <span class="mt-2 text-base leading-normal">Select a file</span>
                 <input type="file" name="image" class="form-control">
                 <span class="px-4 h-4 " style="color:red">@error('image'){{$message}}@enderror</span>

                 <button class=" bg-blue-600 hover:bg-blue-700 text-white my-2 py-1 rounded-xl w-72" type="submit">Update</button>

                 
            </div>
        </div>    
        </form>
        
    </div>
</div>   
</body>
</html>