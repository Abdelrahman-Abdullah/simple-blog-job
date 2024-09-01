<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update: {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('post.update', $post->id) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="title" :value="$post->title" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="content" :value="$post->content" required autocomplete="content" />
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('UPDATE') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
