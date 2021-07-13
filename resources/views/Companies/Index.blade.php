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
                <a class="btn btn-success btn-sm pull-left" href="{{ route('companies.create') }}">Add Company</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/company_export_excel') }}">Export
                    Excel</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/company_export_csv') }}">Export Csv</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-12">
                <form action="{{ route('companies.index') }}" type="get">
                    <table class="table">
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="name" placeholder="Search Name">
                            </label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="address" placeholder="Search Address">
                            </label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="phone" placeholder="Search Phone">
                            </label></th>
                        <th><label>
                                <input class="form-control form-control-sm" type="text"
                                       name="email" placeholder="Search Email">
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
                            <thead class="bg bg-gray-dark">
                            <tr role="row">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th width="100px">Logo</th>
                                <th>Website</th>
                                <th width="50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="/images/{{ $company->logo }}" width="75px" height="75px" alt="images">
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td width="50px">
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                            <div class="col-lg-3">
                                                <a class="col-lg-1" href="{{ route('companies.show', $company->id) }}"
                                                   title="show">
                                                    <i class="fas fa-info-circle fa-lg"></i>
                                                </a>

                                                <a class="col-lg-1" href="{{ route('companies.edit', $company->id) }}"
                                                   title="edit">
                                                    <i class="fas fa-edit fa-lg text-success"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button class="col-lg-1" type="submit" title="delete"
                                                        style="border: none; background-color:transparent;">
                                                    <i class="fas fa-trash-alt fa-lg text-danger"></i>

                                                </button>
                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="small pull-right">{{$companies->links()}}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

