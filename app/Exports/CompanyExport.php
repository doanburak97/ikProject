<?php

namespace App\Exports;

use App\Models\Company;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CompanyExport implements FromCollection,WithHeadings
{
    public function headings():array
    {
        return[
            'Id',
            'name',
            'address',
            'phone',
            'email',
            'logo',
            'website'
        ];
    }

    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        //return AppModelsCompany::all();
        return collect(Company::getCompanies());
    }
}
