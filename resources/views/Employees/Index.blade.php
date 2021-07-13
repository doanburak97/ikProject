@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="card-body">
            <div class="col-lg-12">
                <a class="btn btn-success btn-sm pull-left" href="{{ route('employees.create') }}">Add Employee</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/employee_export_excel') }}">Export
                    Excel</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/employee_export_csv') }}">Export Csv</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <form action="{{ url('/search_employee') }}" type="get">
                    <table class="table">
                        <th><label><input class="form-control form-control-sm" type="text"
                                          name="first_name" placeholder="Search F.Name"></label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="last_name" placeholder="Search L.Name">
                            </label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="email" placeholder="Search Email">
                            </label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="phone" placeholder="Search Phone">
                            </label></th>
                        <th>
                            <button class="btn btn-primary btn-sm w-auto" type="submit">Search</button>
                        </th>
                    </table>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="dataTables_wrapper dt-bootstrap4 col-lg-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <table id="example2" class="table small  table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead class="bg-gray-dark">
                            <tr role="row">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th width="50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td width="50px">
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">

                                            <div class="col-lg-3">
                                                <a class="col-lg-1" href="{{ route('employees.show', $employee->id) }}" title="show">
                                                    <i class="fas fa-info-circle fa-lg"></i>
                                                </a>

                                                <a class="col-lg-1" href="{{ route('employees.edit', $employee->id) }}">
                                                    <i class="fas fa-edit fa-lg text-success"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button class="col-lg-1" type="submit" title="delete"
                                                        style="border: none; background-color:transparent;">
                                                    <i class="fas fa-trash-alt fa-lg text-danger"></i>

                                                </button></div>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach</tbody>
                        </table>
                        <div class="small pull-right">{{$employees->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
