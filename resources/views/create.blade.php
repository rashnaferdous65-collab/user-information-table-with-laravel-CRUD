<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Laravel</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="flex justify-between my-5 items-center">
            <h1 class="text-xl text-red-500 font-semibold">Create</h1>
            <a href="{{ route('home') }}" class="bg-green-600 text-white rounded-lg py-2 px-4 hover:bg-green-700 transition">Back to Home</a>
        </div>

        <!-- Form Section -->
        <div class="form">
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="flex flex-col gap-5 w-80">
                @csrf

                <!-- Name Input -->
                <div>
                    <label class="block mb-1">Add Your Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Input -->
                <div>
                    <label class="block mb-1">Add Your Description</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="w-full border rounded px-3 py-2">
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Input -->
                <div>
                    <label class="block mb-1">Add Your Image</label>
                    <input type="file" name="image" class="w-full">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-green-600 text-white rounded-lg py-2 px-4 w-full hover:bg-green-700 transition">
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
</html>
