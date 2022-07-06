<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit about</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-gray-300" style="font-family: inherit;">
<div class="flex justify-center items-center">  
   <div class="flex flex-col bg-white p-8 rounded-xl">
       
      <form action="{{ route('detailsupdate', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
         @csrf
         @if(Session::get('success'))
           {{Session::get('success')}}
         @endif
         
         @if(Session::get('fail'))
              {{Session::get('fail')}}
         @endif
        <div>
          <h2 class="text-blue-600 text-3xl font-weight-800">Edit About</h2>
          
            <div class="flex flex-col p-4 rounded-xl">
                 <label for="text">Work</label>
                 <textarea  class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="work" placeholder="work.." value="{{ $item->work }}" ></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('work'){{$message}}@enderror</span>
              
                 <label for="text">Study</label>
                 <textarea class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="study" placeholder="Study.."  value="{{ old('study')}}"></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('study'){{$message}}@enderror</span>

                 
                 <label for="text">College</label>
                 <textarea class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="college" placeholder="College.."  value="{{ old('college')}}"></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('college'){{$message}}@enderror</span>

                 <label for="text">Current location</label>
                 <textarea class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="currentlocation" placeholder="College.."  value="{{ old('college')}}"></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('current location'){{$message}}@enderror</span>

                 <label for="text">permanentlocation</label>
                 <textarea class="px-4 h-32 my-2 border border-1 border-gray-300 rounded-xl" name="permanentlocation" placeholder="College.."  value="{{ old('college')}}"></textarea>
                 <span class="px-4 h-4 " style="color:red">@error('permanentlocation'){{$message}}@enderror</span>

                 <label for="text">Join</label>
                 <input class="px-4 h-12 my-2 border border-1 border-gray-300 rounded-xl" type="date" id="birthday" name="join">
                 <span class="px-4 h-4 " style="color:red">@error('join'){{$message}}@enderror</span>

                 <button class=" bg-blue-600 hover:bg-blue-700 text-white my-2 py-1 rounded-xl w-72" type="submit">Update</button>

                 
            </div>
        </div>    
        </form>
    </div>
</div>   
</body>
</html>