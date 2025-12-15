<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post | {{ $ourpost->name }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        input[type="text"],
        textarea,
        input[type="file"] {
            border: 1px solid #d1d5db;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
        }

        #image-preview {
            max-width: 150px;
            margin-top: 0.5rem;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-red-700">
            Update Post: {{ $ourpost->name }}
        </h2>

        <a href="{{ route('home') }}"
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            ← Back
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white shadow rounded-lg p-6">

        <form action="{{ route('post.update', $ourpost->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium mb-1">
                    Edit Name
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="w-full max-w-sm"
                    value="{{ old('name', $ourpost->name) }}"
                >

                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block font-medium mb-1">
                    Edit Description
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="w-full max-w-sm"
                >{{ old('description', $ourpost->description) }}</textarea>

                @error('description')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block font-medium mb-1">
                    Change Image
                </label>

                <input type="file" name="image" id="image" class="w-full max-w-sm" onchange="previewImage(event)">

                <!-- Preview Selected Image -->
                <img id="image-preview" style="display:none;" alt="Image Preview">

                @if($ourpost->image)
                    <div class="mt-3">
                        <p class="text-sm text-gray-500 mb-1">Current Image:</p>
                        <img
                            src="{{ asset('storage/images/'.$ourpost->image) }}"
                            class="w-32 border rounded"
                            alt="Post Image">
                    </div>
                @endif
            </div>

            <!-- Last Updated -->
            <div class="text-gray-500 text-sm">
                Last Updated: {{ $ourpost->updated_at->format('d M Y, h:i A') }}
            </div>

            <!-- Submit -->
            <div>
                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    Update Post
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.style.display = 'block';
    }
</script>

</body>
</html>





