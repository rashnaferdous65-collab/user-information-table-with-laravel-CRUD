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
<body class="bg-gray-50">

@php
    use Illuminate\Support\Str;
@endphp

<!-- Header -->
<div class="container my-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-red-500">
                User Information Page
            </h1>

            <!-- Auth Info -->
            @auth
                <p class="text-sm text-gray-600">
                    Welcome, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </p>
            @else
                <p class="text-sm text-gray-500">
                    You are viewing as Guest
                </p>
            @endauth
        </div>

        <a href="/create"
           class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
            Add New Post
        </a>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
    <p class="mx-auto w-fit rounded bg-green-100 px-4 py-2 text-green-700">
        {{ session('success') }}
    </p>
@endif

<!-- Table Section -->
<div class="mx-auto max-w-7xl px-4 mt-6">
    <div class="overflow-x-auto">
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow bg-white">

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

                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-100">
                            
                            <td class="px-6 py-4 text-sm">
                                {{ $post->id }}
                            </td>

                            <td class="px-6 py-4 text-sm font-medium">
                                {{ $post->name }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($post->description, 40) }}
                            </td>

                            <td class="px-6 py-4">
                                <img 
                                    src="{{ asset('storage/images/' . $post->image) }}"
                                    class="w-[60px] rounded"
                                    alt="Post Image">
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('edit', $post->id) }}"
                                       class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this post?')"
                                            class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                No posts found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <!-- Pagination -->
            <div class="p-4 flex justify-center">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-10 text-center text-sm text-gray-500">
    © {{ date('Y') }} Practice Laravel CRUD
</footer>

</body>
</html>


 