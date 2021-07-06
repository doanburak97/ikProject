@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success btn-sm" href="{{ route('employees.create') }}">Add Employee</a>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table small table-bordered table-hover dataTable dtr-inline" role="grid"
                               aria-describedby="example2_info">
                            <thead class="bg-gray-dark">
                            <tr role="row">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th width="115px">Action</th>
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
                                    <td>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">

                                            <a href="{{ route('employees.show', $employee->id) }}" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a>

                                            <a href="{{ route('employees.edit', $employee->id) }}">
                                                <i class="fas fa-edit  fa-lg"></i>

                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach</tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
