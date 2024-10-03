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
                <x-forms.form method="PATCH" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
                    <x-forms.input label="Company Name" name="name" value="{{ $company->name }}" />
                    <x-forms.input label="Company Email" name="email" value="{{ $company->email }}" />
                    <x-forms.input label="Website (URL)" name="website" placeholder="https://example.com/" value="{{ $company->website }}" />

                    <x-forms.divider />

                    <div x-data="{ chlogo: false }">
                        <button x-on:click="chlogo = ! chlogo">Toggle Dropdown</button>

                        <div x-show="chlogo">
                            Dropdown Contents...
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <div>
                            <img src="{{ asset($company->logo) }}" alt="Logo">
                        </div>
                        <div>
                            <button class="bg-blue-600 py-2 px-4 rounded text-white">Change Logo</button>
                        </div>
                    </div>
                    <x-forms.input label="Company Logo" name="logo" type="file" />

                    <x-forms.button>Update</x-forms.button>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-app-layout>
