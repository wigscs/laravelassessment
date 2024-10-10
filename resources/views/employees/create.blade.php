<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add Employee to Company') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-company-card :$company />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-12">Employee Details</h2>

                <x-forms.form x-cloak method="POST" action="{{ route('employee.store', $company) }}">
                    <x-forms.input label="First Name" name="first_name" required />
                    <x-forms.input label="Last Name" name="last_name" required />
                    <x-forms.input label="Email Address" name="email" type="email" />
                    <x-forms.input label="Phone Number" name="phone" />

                    <x-forms.button>Create Employee</x-forms.button>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-app-layout>
