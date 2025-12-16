<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply mx-auto px-10;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="container my-6">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-semibold text-red-500">
                User Information Page
            </h1>

            <a href="/create"
               class="rounded bg-green-600 px-4 py-2 text-white">
                Add New Post
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <p class="mx-auto w-fit py-4 text-green-600">
            {{ session('success') }}
        </p>
    @endif

    <!-- Table Section -->
    <div class="mx-auto max-w-7xl px-4">
        <div class="overflow-x-auto">
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow">

                <table class="min-w-full divide-y divide-gray-200">
                    
                    <!-- Table Head -->
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">Image</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="divide-y divide-gray-200">
                        @foreach($posts as $post)
                            <tr class="hover:bg-gray-100">
                                
                                <td class="px-6 py-4 text-sm">
                                    {{ $post->id }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    {{ $post->name }}
                                </td>

                                <td class="px-6 py-4 text-sm">
                                    {{ $post->description }}
                                </td>

                                <td class="px-6 py-4">
                                    <img 
                                        src="{{ asset('storage/images/' . $post->image) }}"
                                        class="w-[60px]"
                                        alt="Post Image">
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('edit', $post->id) }}"
                                           class="rounded bg-green-600 px-4 py-2 text-white">
                                            Edit
                                        </a>

                                        <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded bg-red-600 px-4 py-2 text-white">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="p-4 flex justify-center text-white">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>

</body>
</html>


 