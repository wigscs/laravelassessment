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

                <h2 class="text-2xl font-bold mb-12">Company Details</h2>

                <x-forms.form x-data="imgPreview" x-cloak method="PATCH" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
                    <x-forms.input label="Company Name" name="name" value="{{ old('name', $company->name)  }}" />
                    <x-forms.input label="Company Email" name="email" value="{{ old('email', $company->email) }}" />
                    <x-forms.input label="Website (URL)" name="website" placeholder="https://example.com/" value="{{ old('website', $company->website) }}" />

                    <x-forms.image label="Company Logo" name="logo" type="file" :preview="asset($company->logo)" />

                    <x-forms.button>Update</x-forms.button>
                </x-forms.form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between">
                    <div>
                        <h3 class="text-xl font-bold mb-6">{{ $company->name }} Employees</h3>
                    </div>
                    <div>
                        <a class="bg-blue-600 py-2 px-4 rounded text-white font-bold" href="{{ route('employee.create', $company) }}">Add Employee</a>
                    </div>
                </div>

                <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                    <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                        <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                            <tr>
                                <th scope="col" class="p-4">Name</th>
                                <th scope="col" class="p-4">Email</th>
                                <th scope="col" class="p-4 hidden sm:table-cell">Phone Number</th>
                                <th scope="col" class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                            @foreach ($company->employees as $employee)
                                <tr>
                                    <td class="p-4">{{ $employee->full_name }}</td>
                                    <td class="p-4"><a class="text-blue-500 hover:underline" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                                    <td class="p-4 hidden sm:table-cell"><a class="text-green-500 hover:underline" href="tel:+{{ $employee->phone }}">{{ $employee->phone }}</a></td>
                                    <td class="p-4 flex gap-2">
                                        <a href="{{ route('employee.edit', $employee) }}"><x-icons.edit /></a>


                                        <form x-data method="POST" action="{{ route('employee.destroy', $employee) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button x-data @click="if(!confirm('Are you sure you wan\'t to delete this employee?')) $event.preventDefault()" href="#"><x-icons.delete /></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex justify-between">
                <div>
                    <h3 class="text-xl font-bold">Delete Company and Employees</h3>
                </div>
                <div>
                    <form x-data method="POST" action="{{ route('company.destroy', $company) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button @click="if(!confirm('Are you sure you wan\'t to delete this company and all of it\'s employees?')) $event.preventDefault()" type="submit" class="bg-red-600 hover:bg-red-600/90 rounded py-1 px-4 text-white font-bold">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
