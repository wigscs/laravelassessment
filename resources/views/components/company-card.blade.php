@props(['company'])

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
            <a href="{{ route('company.edit', $company) }}" class="bg-blue-600 hover:bg-blue-600/90 rounded py-1 px-4 text-white font-bold inline-block">Edit</a>

        </div>
    </div>
</div>
