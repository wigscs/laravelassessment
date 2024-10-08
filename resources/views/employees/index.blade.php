<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Companies') }}
                </h2>
            </div>
            <div class="md:w-96">
                <form action="{{ route('companies.index') }}" class="flex">
                    <input type="text" name="q" placeholder="Search Companies..." value="{{ request('q') }}" class="rounded-tl rounded-bl w-full focus:border-1 focus:ring-0">
                    <button type="submit" class="bg-black hover:bg-black/90 text-white px-3 rounded-tr rounded-br">Search</button>
                </form>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <div class="text-left">
                    @if (request('q'))
                        <h3 class="text-lg inline-block mr-6"><em>{{ $qCount }} results for: </em> "{{ request('q') }}"</h3>
                        <a class="bg-red-600 text-white inline-block rounded py-1 px-4" href="{{ route('companies.index') }}">Clear Search</a>
                    @endif
                </div>
                <div class="text-right">
                    <a href="{{ route('companies.create') }}" class="bg-blue-600 py-1 px-4 text-white rounded font-bold inline-block">Create New Company</a>
                </div>
            </div>

            @foreach ($companies as $company)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div class="flex mr-4">
                            <div class="mr-4 hidden sm:flex items-center">
                                <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" height="100" width="100">
                            </div>
                            <div class="space-y-1 pl-4 sm:border-l border-gray-400">
                                <h3 class="text-lg font-bold">{{ $company->name }}</h3>
                                <span class="text-sm">Employees: {{ $company->employees()->count() }}</span>
                                <p><a class="text-sky-600 underline" href="mailto:email@email.com">email@email.com</a></p>
                                <p><a class="text-sky-600 underline" target="_blank" href="http://google.com">http://google.com</a></p>
                            </div>
                        </div>
                        <div class="space-y-1 text-right pl-6 mb-auto">
                            <a href="{{ route('companies.edit', $company) }}" class="bg-blue-600 hover:bg-blue-600/90 rounded py-1 px-4 text-white font-bold inline-block">Edit</a>

                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                {{ $companies->appends(['q' => request('q')])->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
