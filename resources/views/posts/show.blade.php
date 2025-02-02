<x-app-layout>
    @guest
        <x-slot name="textBanner">
            <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gönderilerinizi düzenlemek veya yenilerini oluşturmak için giriş yapın') }}
            </h4>
        </x-slot>
    @endguest
    <div class="bg-white py-16 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @auth
                @can('update', $post)
                    <div class="flex justify-end">
                        <a href="{{ route('posts.edit', $post) }}">
                            <x-secondary-button>Düzenle</x-secondary-button>
                        </a>
                    </div>
                @endcan
            @endauth
            <div class="mx-auto max-w-8xl">

                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ $post->title }}</p>
                <div class="mt-2 flex items-center gap-x-8 text-xs">
                    <p class="text-gray-500">
                        {{ 'Güncellendi ' . $post->updated_at->diffForHumans() . ' tarafından ' . $post->user->name }}
                    </p>
                </div>
                <p class="mt-6 text-lg leading-8 text-gray-600"
                    style="white-space: pre-wrap;">{{ $post->body }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
