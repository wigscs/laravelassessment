<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Company') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-forms.form x-data="imgPreview" x-cloak method="PATCH" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
                    <x-forms.input label="Company Name" name="name" value="{{ old('name', $company->name)  }}" />
                    <x-forms.input label="Company Email" name="email" value="{{ old('email', $company->email) }}" />
                    <x-forms.input label="Website (URL)" name="website" placeholder="https://example.com/" value="{{ old('website', $company->website) }}" />

                    <x-forms.image label="Company Logo" name="logo" type="file" :preview="asset($company->logo)" />

                    <x-forms.button>Update</x-forms.button>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-app-layout>
