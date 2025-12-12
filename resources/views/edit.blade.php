<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - {{ $ourpost->name }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Basic styling for form inputs for better visual appearance */
        input[type="text"], textarea, input[type="file"] {
            border: 1px solid #d1d5db; /* gray-300 */
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem; /* rounded */
            max-width: 20rem; /* w-80 equivalent */
        }
    </style>
</head>
<body>

<div class="container mx-auto px-4 sm:px-10 mt-5">
    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-red-700">Edit Post: {{ $ourpost->name }}</h1>
        <a href="{{ route('home') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded py-2 px-4 transition duration-150 ease-in-out">
            Back To Home
        </a>
    </div>

    <div class="form">
        <form action="{{ route('post.update', $ourpost->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            
            @csrf
            @method('PUT') 
            
            <div class="flex flex-col gap-5">
                
                <div>
                    <label for="name" class="w-80">Edit Your Name</label> <br>
                    <input 
                        type="text" 
                        id="name"
                        name="name" 
                        class="w-full max-w-sm" 
                        value="{{ old('name', $ourpost->name) }}"
                    >
                    @error('name')
                        <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="w-80">Edit Your Description</label> <br>
                    <textarea
                        id="description"
                        name="description" 
                        rows="4"
                        class="w-full max-w-sm"
                    >{{ old('description', $ourpost->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-1">Edit Your Image</label>
                    <input type="file" id="image" name="image" class="w-full max-w-sm">
    @if(!empty($ourpost->image))
    <p class="text-sm text-gray-500 mt-2">
        Current Image:
        <br>
        <img src="{{ asset('storage/images/' . $ourpost->image) }}" alt="Current Image" class="w-32 h-auto border rounded">
    </p>
@endif

                </div>

                <div>
                    <button 
                        type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold rounded py-2 px-6 w-auto transition duration-150 ease-in-out mt-3"
                    >
                        Update Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>



