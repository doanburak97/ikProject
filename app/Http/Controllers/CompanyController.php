<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Mail\Contact;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = $this->companyRepository->index();

        if (!$companies)
        {
            return redirect()->route('companies.create');
        }

        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyStoreRequest $request)
    {
        $this->companyRepository->store($request);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
        $this->companyRepository->update($request, $company);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }

    /**
     * @param CompanyStoreRequest $request

     * @return array
     */
    private function uploadLogo(CompanyStoreRequest $request): array
    {

        $input=$request->all();
        if ($logo = $request->file('logo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $input['logo'] = "$profileImage";

            Storage::disk('public')->put($input['logo'], 'Contents');
        }

        return $input;
    }

    public function search_company(Request $request)
    {
        $companies = Company::query()
            ->when($request->input('name'),fn($query,$value)=>$query->where('name', 'LIKE', '%'.$value.'%'))
            ->when($request->input('address'),fn($query,$value)=>$query->where('address', 'LIKE', '%'.$value.'%'))
            ->when($request->input('phone'),fn($query,$value)=>$query->where('phone', 'LIKE', '%'.$value.'%'))
            ->when($request->input('email'),fn($query,$value)=>$query->where('email', 'LIKE', '%'.$value.'%'))
            ->paginate(10);

        return view('Companies.Index', compact('companies'));
    }
}
