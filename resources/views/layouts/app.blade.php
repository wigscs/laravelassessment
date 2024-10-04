<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @if (session('success'))
                <div x-show="open" class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6" x-data="{ open: true }">
                    <!-- success Alert -->
                    <div
                        class="relative w-full overflow-hidden rounded-md border border-green-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300"
                        role="alert">
                        <div class="flex w-full items-center gap-2 bg-green-500/10 p-4">
                            <div class="bg-green-500/15 text-green-500 rounded-full p-1" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-6" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-2">
                                <h3 class="text-sm font-semibold text-green-500">Success</h3>
                                <p class="text-xs font-medium sm:text-sm">{{ session('success') }}</p>
                            </div>
                            <button class="ml-auto" aria-label="dismiss alert" @click="open = ! open">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>

</html>
