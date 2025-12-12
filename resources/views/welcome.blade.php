<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information page</title>
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
            <h1 class="text-red-500 text-xl">User Information Page</h1>
            <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Post</a>
        </div>
    </div>
    
    @if(session('success'))
        <h2 class="text-green-600 py-5 w-fit mx-auto">{{session('success')}}</h2>
    @endif
    
    <div class="max-w-7xl mx-auto p-4"> 

        <div class="p-1.5 overflow-x-auto"> 
            
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Id</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Description</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase">Image</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium uppercase">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        @foreach($posts as $post)
                            <tr class="hover:bg-gray-100 dark:hover:bg-oklch(87.2% 0.01 258.338)">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-neutral-500">{{$post->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-neutral-500">{{$post->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-neutral-500">{{$post->description}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-neutral-500"><img src="{{ asset('storage/images/' . $post->image) }}" width="60px" alt=""></td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <div class="flex justify-end space-x-2"> 
                                        <a href="{{route('edit', $post->id)}}" 
                                            class="bg-green-600 text-white rounded py-2 px-4" >
                                            Edit
                                        </a> 
                                        <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="bg-red-600 text-white rounded py-2 px-4">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td> 
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
                
                <div class="p-4"> 
                    <div style=" color:white; display:flex; justify-content:center; align-item:center;"> 
                        {{$posts->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

 