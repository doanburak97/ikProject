<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class EmployeeController extends Controller
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index(Request $request): View|Factory|RedirectResponse|Application
    {
        $employees = $this->employeeRepository->index($request);

        if (!$employees)
        {
            return redirect()->route('employees.create');
        }

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeStoreRequest $request): RedirectResponse
    {

        $this->employeeRepository->store($request);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function show(Employee $employee): View|Factory|Application
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit(Employee $employee): View|Factory|Application
    {
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeStoreRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeStoreRequest $request, Employee $employee): RedirectResponse
    {

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    public function search_employee(Request $request): Factory|View|Application
    {
        $employees = Employee::query()
            ->when($request->input('first_name'),fn($query,$value)=>$query->where('first_name','LIKE', '%'.$value.'%'))
            ->when($request->input('last_name'),fn($query,$value)=>$query->where('last_name','LIKE', '%'.$value.'%'))
            ->when($request->input('email'),fn($query,$value)=>$query->where('email','LIKE', '%'.$value.'%'))
            ->when($request->input('phone'),fn($query,$value)=>$query->where('phone','LIKE', '%'.$value.'%'))
            ->paginate(10);

        return view('Employees.Index', compact('employees'));
    }
//
//    /**
//     */
//    public function employeeExportIntoExcel(): BinaryFileResponse
//    {
//        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
//    }
//
//    public function employeeExportIntoCSV(): BinaryFileResponse
//    {
//        return Excel::download(new EmployeeExport, 'employeelist.csv');
//    }
}
