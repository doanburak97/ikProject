<?php


namespace App\Repositories;


use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRepository
{
    public function index()
    {
        return Employee::count();
    }

    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->all());
    }

    public function search_employee(Request $request)
    {
        $employees = Employee::query()
            ->when($request->input('first_name'),fn($query,$value)=>$query->where('first_name','LIKE', '%'.$value.'%'))
            ->when($request->input('last_name'),fn($query,$value)=>$query->where('last_name','LIKE', '%'.$value.'%'))
            ->when($request->input('email'),fn($query,$value)=>$query->where('email','LIKE', '%'.$value.'%'))
            ->when($request->input('phone'),fn($query,$value)=>$query->where('phone','LIKE', '%'.$value.'%'))
            ->paginate(10);

        return view('Employees.Index', compact('employees'));
    }
}
