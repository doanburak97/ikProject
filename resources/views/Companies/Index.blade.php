@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="card-header bg-white">
            <div class="fa-pull-left">
                <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">Add Company</a>
            </div>
        </div>
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 col-lg-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 p-2">
                        <form class="form-inline" method="GET">
                            <div class="form-group mb-2">
                                <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                                <input type="text" class="form-control" id="filter" name="filter"
                                       placeholder="Search Name...">
                            </div>
                            <button type="submit" class="btn btn-default mb-2">Filter</button>
                        </form>
                        <table id="example2" class="table small  table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               aria-describedby="example2_info">
                            {{--                            <thead>--}}
                            {{--                            <tr style="height: min-content;" role="row">--}}
                            {{--                                <th></th>--}}
                            {{--                                <th><input class="w-100 form-control filter-input" type="text"--}}
                            {{--                                           placeholder="Name Search" data-column="1"></th>--}}
                            {{--                                <th><input class="w-100 form-control filter-input" type="text"--}}
                            {{--                                           placeholder="Address Search" data-column="2"></th>--}}
                            {{--                                <th><input class="w-100 form-control filter-input" type="text"--}}
                            {{--                                           placeholder="Phone Search" data-column="3"></th>--}}
                            {{--                                <th><input class="w-100 form-control filter-input" type="text"--}}
                            {{--                                           placeholder="Email Search" data-column="4"></th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th>--}}
                            {{--                                    <button class="btn btn-sm-secondary w-100"><i class="fas fa-search"></i></button>--}}
                            {{--                                </th>--}}
                            {{--                            </tr>--}}
                            {{--                            </thead>--}}
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

