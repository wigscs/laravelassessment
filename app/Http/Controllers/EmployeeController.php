<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('employees.create', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Company $company, Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $company->employees()->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        return redirect()->route('companies.edit', $company)->with('success', 'Employee added to company.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $employee->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        return redirect()->route('companies.edit', $employee->company)->with('success', 'Employee updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $company = $employee->company;
        $employee->delete();

        return redirect()->route('companies.edit', $company)->with('success', 'Employee deleted.');
    }
}
