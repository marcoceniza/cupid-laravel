<x-layout>
    <div class="mx-auto w-[500px]">
        <h2 class="text-center text-[25px] mb-[25px]">Login Here</h2>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" class="@error('email')
                ring-1 ring-red-500
            @enderror">
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" class="@error('password')
                ring-1 ring-red-500
            @enderror">
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button class="submit">Login</button>
            </div>
        </form>
    </div>
</x-layout>