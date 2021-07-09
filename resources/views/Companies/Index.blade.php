@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="card-header bg-white">
            <div class="col-lg-12">
                <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">Add Company</a>
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
                        <table id="example2" class="table small  table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead>
                            <form action="{{ url('/search_company') }}" type="get">
                                <thread>
                                    <tr>
                                        <th></th>
                                        <th><input class="form-control form-control-sm w-auto" type="search"
                                                   name="name" placeholder="Search Name"></th>
                                        <th><input class="form-control form-control-sm w-auto" type="search"
                                                   name="address" placeholder="Search Address"></th>
                                        <th><input class="form-control form-control-sm w-auto" type="search"
                                                   name="phone" placeholder="Search Phone"></th>
                                        <th><input class="form-control form-control-sm w-auto" type="search"
                                                   name="email" placeholder="Search Email"></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </th>
                                    </tr>
                                </thread>
                            </form>
                            </thead>
                            <thead class="bg bg-gray-dark">
                            <tr role="row">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th width="100px">Logo</th>
                                <th>Website</th>
                                <th width="115px">Action</th>
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
                                    <td><img src="/images/{{ $company->logo }}" width="75px" ; height="75px"></td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">

                                            <a href="{{ route('companies.show', $company->id) }}" title="show">
                                                <i class="fas fa-eye text-success fa-lg"></i>
                                            </a>

                                            <a href="{{ route('companies.edit', $company->id) }}" title="edit">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete"
                                                    style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>

                                            </button>
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

