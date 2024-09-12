<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>-</title>
        @vite('resources/css/app.css')

        <div>
            <header class="h-[50px] leading-[50px] px-3 bg-[#2ea8d8]">
                <div class="container mx-auto">
                    <nav class="flex justify-between text-[#fff]">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                        </ul>
                        <ul class="flex space-x-5">
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register.create') }}">Register</a></li>
                            @endguest
                            @auth
                                <li><a href="{{ route('dashboard') }}">Your Post</a></li>
                                <li><a href="{{ route('post.create') }}">Create Post</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf

                                        <button>Logout</button>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </header>

            <main class="mt-10 container mx-auto">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>