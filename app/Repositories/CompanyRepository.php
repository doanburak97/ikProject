<?php


namespace App\Repositories;


use App\Http\Requests\CompanyStoreRequest;
use App\Mail\Contact;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyRepository
{
    /**
     * @return mixed
     */
    public function index()
    {
        return Company::count();
    }

    /**
     * @param Request $request
     */
    public function store(CompanyStoreRequest $request)
    {
        $input = $this->uploadLogo($request);

        Company::create($input);

        Mail::to($request->input('email'))->send(new Contact());
    }

    public function update(CompanyStoreRequest $request, Company $company)
    {
        $input = $this->uploadLogo($request);

        $company->update($input);
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
