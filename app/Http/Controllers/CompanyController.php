<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qCount = null;
        $q = Company::with('employees');

        if ($request->has('q')) {
            $q->where('name', 'LIKE', '%'.$request->get('q').'%');
            $qCount = $q->count();
        }
        $companies = $q->orderByRaw('UPPER(name)')->paginate(10);

        return view('companies.index', ['companies' => $companies, 'qCount' => $qCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $validated['logo'] = $request->has('logo') ? $request->validated('logo')->store('logos') : null;

        $company = Company::create($validated);

        return redirect()->route('companies.edit', $company)->with('success', 'Company created.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Company $company)
    // {
    //     return view('companies.show', ['company' => $company]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $employees = $company->employees()->orderByRaw('UPPER(first_name), UPPER(last_name)')->paginate(10);

        return view('companies.edit', ['company' => $company, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        $validated['logo'] = $request->has('logo') ? $request->validated('logo')->store('logos') : $company->logo;

        $company->update($validated);

        return redirect()->route('companies.edit', $company)->with('success', 'Company updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted.');
    }
}
