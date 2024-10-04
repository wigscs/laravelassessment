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
        $companies = $q->paginate(10);

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'website' => 'required|url',
            'logo' => ['required', File::image()->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100))->max(12 * 1024)],
        ]);

        $logoPath = $request->logo->store('logos');

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logoPath,
        ]);

        return redirect()->route('company.edit', $company)->with('success', 'Company created.');
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
        $company->load('employees');
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'website' => 'required|url',
            'logo' => [File::image()->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100))->max(12 * 1024)],
        ]);

        $logoPath = $request->has('logo') ? $request->logo->store('logos') : $company->logo;

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logoPath,
        ]);

        return redirect()->route('company.edit', $company)->with('success', 'Company updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company')->with('success', 'Company deleted.');
    }
}
