<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Companies') }}
                </h2>
                <p>A list of all the companies you manage.</p>
            </div>
            <div class="md:w-96">
                <form action="{{ route('dashboard') }}" class="flex">
                    <input type="text" name="q" placeholder="Search Companies..." class="rounded-tl rounded-bl w-full focus:border-1 focus:ring-0">
                    <button type="submit" class="bg-black hover:bg-black/90 text-white px-3 rounded-tr rounded-br">Search</button>
                </form>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($companies as $company)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div class="flex mr-4">
                            <div class="mr-4 hidden sm:block">
                                <img src="{{ $company->logo }}" alt="{{ $company->name }}" height="100" width="100">
                            </div>
                            <div class="space-y-1 pl-4 sm:border-l border-gray-400">
                                <h3 class="text-lg font-bold">{{ $company->name }}</h3>
                                <span class="text-sm">Employees: {{ $company->employees()->count() }}</span>
                                <p><a class="text-sky-600 underline" href="mailto:email@email.com">email@email.com</a></p>
                                <p><a class="text-sky-600 underline" target="_blank" href="http://google.com">http://google.com</a></p>
                            </div>
                        </div>
                        <div class="space-y-1 text-right pl-6 my-auto">
                            <button class="bg-blue-600 hover:bg-blue-600/90 rounded py-1 px-4 text-white font-bold">Edit</button>
                            <button class="bg-red-600 hover:bg-red-600/90 rounded py-1 px-4 text-white font-bold">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                {{ $companies->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
