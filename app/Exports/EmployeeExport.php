<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection,WithHeadings
{
    public function headings():array
    {
        return[
            'Id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'company_id',
        ];
    }

    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        //return Employee::all();
        return collect(Employee::getEmployees());
    }
}
