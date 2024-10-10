<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col justify-between space-y-4 md:items-center md:flex-row md:space-y-0">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Employee') }}
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-company-card :company="$employee->company" />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-12">Employee Details</h2>

                <x-forms.form method="PATCH" action="{{ route('employee.update', $employee) }}">
                    <x-forms.input label="First Name" name="first_name" required value="{{ old('first_name', $employee->first_name)  }}" />
                    <x-forms.input label="Last Name" name="last_name" required value="{{ old('last_name', $employee->last_name)  }}" />
                    <x-forms.input label="Email Address" name="email" type="email" value="{{ old('email', $employee->email)  }}" />
                    <x-forms.input label="Phone Number" name="phone" value="{{ old('phone', $employee->phone)  }}" />

                    <x-forms.button>Update Employee</x-forms.button>
                </x-forms.form>

            </div>
        </div>
    </div>
</x-app-layout>
