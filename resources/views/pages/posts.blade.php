<x-layout>
    <div class="mx-auto w-[500px]">
        <h2 class="text-center text-[25px] mb-[25px]">Create Post</h2>
        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            <div>
                <label for="name">Title:</label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" class="@error('title')
                    ring-1 ring-red-500
                @enderror">
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body">Body:</label>
                <textarea name="body" id="body" cols="10" rows="5" value="{{ old('body') }}" class="@error('body')
                ring-1 ring-red-500
            @enderror"></textarea>
                @error('body')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button class="submit">Create Post</button>
            </div>
        </form>
    </div>
</x-layout>