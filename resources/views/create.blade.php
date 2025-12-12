<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice laravel</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
  <style type="text/tailwindcss">
    @layer utilities{

        .container{
            @apply px-10 mx-auto;
        }
    }
      </style>
</head>
<body>
    <div class="container">
   <div class="flex justify-between my-5">
     <h1 class="text-red-500 text-xl">Create</h1>
    <a href="{{route ('home')}}" class="bg-green-600 text-white rounded py-2 px-4">Back to Home</a>
   </div>

   <div class="form">

   <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    @csrf
   <div class="flex flex-col gap-5">
    <label for="">Add Your Name</label>
     <input type="text" name="name" class="w-80" value="{{old ('name')}}">
     @error('name')
    <p class="text-red-600">{{$message}}</p>
     @enderror
     <label for="">Add Your Description</label>
  <input type="text" name="description" class="w-80" value="{{old ('description')}}">
   @error('description')
    <p class="text-red-600">{{$message}}</p>
     @enderror
  <label for="">Add Your Image</label>
  <input type="file" name="image">
   <input type="submit" name="Submit" class="bg-green-600 text-white rounded py-2 px-4 w-20">
   </div>


   </form>
   </div>
    </div>
    
</body>
</html>