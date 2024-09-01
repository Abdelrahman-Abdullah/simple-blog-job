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
                    <h1 class="text-2xl font-semibold mb-4">Latest Posts</h1>
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Card 1 -->
                            <div class="col-span-1 bg-white rounded-lg shadow-md p-4 flex flex-col h-full">
                                <h2 class="font-bold text-lg mb-2 text-gray-800 truncate">Post Title 1</h2>
                                <p class="text-gray-600 text-sm flex-grow mb-3 line-clamp-3">Post description 1. This is where the content of the post would go.</p>
                                <p class="text-xs text-gray-500">
                                    Created: Sep 1, 2024
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
