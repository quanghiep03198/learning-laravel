<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="https://laravel.com/img/logomark.min.svg" />
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex h-screen items-center w-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="flex items-center flex-col max-w-lg mx-auto w-full space-y-10">
            <div class="flex flex-col items-center gap-y-4">
                <a href="/" class="text-center">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="">
                </a>
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="w-full">
                <form class="space-y-6" action="{{ route('auth.login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm  border border-border placeholder:text-gray-400 focus:border-primary sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">
                                Password
                            </label>
                            <div class="text-sm">
                                <a href="/forgot-password"
                                    class="font-semibold hover:text-primary transition-colors duration-300">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm  border-border placeholder:text-gray-400 focus:border-primary sm:text-sm sm:leading-6 transition-opacity duration-300">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition-opacity duration-300 ">Sign
                            in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Not a member?
                    <a href="#"
                        class="font-semibold leading-6 text-primary hover:opacity-80 transition-opacity duration-300">
                        Register now
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>
@php
    var_dump($_POST);
@endphp
