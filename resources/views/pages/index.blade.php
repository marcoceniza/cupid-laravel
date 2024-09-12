<x-layout>
    <h1 class="text-center">Posts</h1>

    @if($posts->count())
        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <p class="font-bold text-[#555]">{{ $post->body }} <span class="font-normal block text-[12px] text-[#8a8a8a]">Posted on: {{ $post->created_at->diffForHumans() }} By {{ $post->user->name }}</span></p>
            </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif
</x-layout>