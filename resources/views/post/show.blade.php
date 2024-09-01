<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Simple Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-12 sm:grid-cols-2 lg:grid-cols-12 gap-4">
                            <div class="flex justify-between">
                             <h1 class="text-2xl font-semibold">POST</h1>
                                <a href="{{ route('comment.create',$post->id) }}" class="block bg-blue-700 hover:bg-amber-600 font-bold py-2 px-4  rounded text-red-600 border border-blue-500">
                                    Add Comment
                                </a>
                            </div>

                            <!-- Card 1 -->
                                <div class="col-span-1 bg-white rounded-lg shadow-md p-4 flex flex-col h-full">
                                    <h2 class="font-bold text-lg mb-2 text-gray-800 truncate">{{ ucfirst($post->title) }}</h2>
                                    <p class="text-gray-800 text-sm flex-grow mb-3 line-clamp-3">{{ $post->content }}</p>
                                    <p class="text-xs text-gray-500">
                                        Created: {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                        </div>
                        <div class="mt-6">
                            <h2 class="text-2xl font-semibold">Comments</h2>

                            @forelse($post->comments as $comment)
                                <div class="flex bg-white rounded-lg shadow-md p-4 mt-4 justify-between" >
                                    <div>
                                        <p class="text-gray-800 text-sm">{{ $comment->content }}</p>
                                        <p class="text-xs text-gray-500">
                                            Created: {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>

                                    @if($comment->user_id == auth()->id())
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-blue-800 font-semibold">
                                                Delete
                                            </button>
                                    @endif
                                </div>
                            @empty
                                <p class="text-gray-800 text-sm">No comments yet.</p>
                            @endforelse
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
