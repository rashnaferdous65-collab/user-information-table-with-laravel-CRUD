<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD - Create</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-5 sm:px-10 mx-auto;
            }
        }
    </style>
    <script>
        // Image preview function
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container bg-white shadow-md rounded-lg p-6 max-w-md w-full">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-2xl text-red-600 font-bold">Create Record</h1>
            <a href="{{ route('home') }}" class="bg-green-600 text-white rounded-lg py-2 px-4 hover:bg-green-700 transition">Back to Home</a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Section -->
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="flex flex-col gap-4">
            @csrf

            <!-- Name Input -->
            <div>
                <label class="block mb-1 font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Input -->
            <div>
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" rows="3" placeholder="Enter description"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Input -->
            <div>
                <label class="block mb-1 font-medium">Upload Image</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                       class="w-full border border-gray-300 rounded px-3 py-2">
                <img id="imagePreview" class="mt-3 w-32 h-32 object-cover rounded hidden" />
                @error('image')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-green-600 text-white rounded-lg py-2 px-4 w-full hover:bg-green-700 transition">
                Submit
            </button>
        </form>
    </div>

    <script>
        // Show image preview if file selected
        document.querySelector('input[name="image"]').addEventListener('change', function(event) {
            const output = document.getElementById('imagePreview');
            if (event.target.files.length > 0) {
                output.src = URL.createObjectURL(event.target.files[0]);
                output.classList.remove('hidden');
            } else {
                output.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

