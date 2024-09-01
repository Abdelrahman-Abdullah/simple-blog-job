<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Simple Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Welcome, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold">Latest Posts</h1>
                        <a href="{{ route('post.create') }}" class="block bg-blue-700 hover:bg-amber-600 font-bold py-2 px-4  rounded text-red-600 border border-blue-500">
                            +
                        </a>

                    </div>
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Card 1 -->
                            @foreach($posts as $post)
                                <div class="col-span-1 bg-white rounded-lg shadow-md p-4 flex flex-col h-full">
                                    <h2 class="font-bold text-lg mb-2 text-gray-800 truncate">{{ ucfirst($post->title) }}</h2>
                                    <p class="text-gray-800 text-sm flex-grow mb-3 line-clamp-3">{{ $post->content }}</p>
                                    <p class="text-xs text-gray-500">
                                        Created: {{ $post->created_at->diffForHumans() }}
                                    </p>
                                    <div class="mt-6 text-right">
                                        <a href="{{ route('post.show', $post->id) }}" class="text-red-600 hover:text-blue-800 font-semibold">
                                            View Post ➡️
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
