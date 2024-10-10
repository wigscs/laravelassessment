<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create New Company') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-12">Company Details</h2>

                <x-forms.form x-data="imgPreview" x-cloak method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                    <x-forms.input label="Company Name" name="name" required />
                    <x-forms.input label="Company Email" name="email" type="email" />
                    <x-forms.input label="Website (URL)" name="website" placeholder="https://example.com/" />

                    <x-forms.image label="Company Logo" name="logo" type="file" />

                    <x-forms.button>Create</x-forms.button>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-app-layout>
