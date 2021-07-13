@extends('layouts.layout')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-3 pull-right">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success small d-flex align-items-center" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <a class="btn btn-secondary btn-outline-success btn-sm pull-left" href="{{ route('employees.create') }}">Add</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/employee/export?type=xlsx') }}">Export
                    Excel</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/employee/export?type=csv') }}">Export
                    Csv</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <div class="dataTables_wrapper dt-bootstrap4 col-lg-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <table class="table small table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               aria-describedby="example2_info">
                            <form action="{{ url('/search_employee') }}" type="get">
                                <thead>
                                <tr>
                                    <th><input class="form-control form-control-sm" type="text"
                                               name="first_name" placeholder="Search First Name"></th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="last_name" placeholder="Search Last Name">
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="email" placeholder="Search Email">
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="phone" placeholder="Search Phone">
                                    </th>
                                    <th></th>
                                    <th>
                                        <div style="text-align: center;">
                                            <button class="btn btn-outline-primary btn-sm w-auto" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                            </form>
                            <thead class="bg-gray-dark">
                            <tr role="row">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td style="width: 115px;">
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">

                                            <div>
                                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('employees.show', $employee->id) }}"
                                                   title="show">
                                                    <i class="fas fa-info-circle fa-lg"></i>
                                                </a>

{{--                                                <a class="col-lg-1" href="{{ route('employees.edit', $employee->id) }}">--}}
{{--                                                    <i class="fas fa-edit fa-lg text-success"></i>--}}
{{--                                                </a>--}}

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-danger btn-sm" type="submit" title="delete">
                                                    <i class="fas fa-trash-alt fa-lg text"></i>

                                                </button>
                                            </div>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="small">{{$employees->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
