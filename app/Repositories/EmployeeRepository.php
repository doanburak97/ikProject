<?php


namespace App\Repositories;


use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRepository
{
    public function index(Request $request)
    {
        return Employee::query()
            ->with('company')
            ->when($request->input('first_name'),fn($query,$value)=>$query->where('first_name','LIKE', '%'.$value.'%'))
            ->when($request->input('last_name'),fn($query,$value)=>$query->where('last_name','LIKE', '%'.$value.'%'))
            ->when($request->input('email'),fn($query,$value)=>$query->where('email','LIKE', '%'.$value.'%'))
            ->when($request->input('phone'),fn($query,$value)=>$query->where('phone','LIKE', '%'.$value.'%'))
            ->paginate(10);
    }

    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->all());
    }

}
