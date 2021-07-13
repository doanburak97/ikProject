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
                <a class="btn btn-secondary btn-outline-success btn-sm pull-left" href="{{ route('companies.create') }}">Add</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/company/export?type=xlsx') }}">Export
                    Excel</a>
                <a class="btn btn-secondary btn-sm pull-right" href="{{ url('/company/export?type=csv') }}">Export
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
                            <form action="{{ route('companies.index') }}" type="get">
                                <thead>
                                <tr>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="name" placeholder="Search Name">
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="address" placeholder="Search Address">
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="phone" placeholder="Search Phone">
                                    </th>
                                    <th>
                                        <input class="form-control form-control-sm" type="text"
                                               name="email" placeholder="Search Email">
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <div style="text-align: center;">
                                            <button class="btn btn-outline-primary btn-sm" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                            </form>
                            <thead class="bg bg-gray-dark">
                            <tr role="row">
                                {{--                                <th>Id</th>--}}
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th width="100px">Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    {{--                                    <td>{{ $company->id }}</td>--}}
                                    <td><a href="{{ route('companies.edit', $company->id) }}">{{ $company->name }}</a>
                                    </td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="/images/{{ $company->logo }}" width="75px" height="75px" alt="images">
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td style="width: 115px;">
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                            <div>
                                                <a class="btn btn-outline-secondary btn-sm"
                                                   href="{{ route('companies.show', $company->id) }}"
                                                   title="show">
                                                    <i class="fas fa-info-circle fa-lg"></i>
                                                </a>

                                                {{--                                                <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.edit', $company->id) }}"--}}
                                                {{--                                                   title="edit">--}}
                                                {{--                                                    <i class="fas fa-edit fa-lg text"></i>--}}
                                                {{--                                                </a>--}}

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-danger btn-sm" type="submit"
                                                        title="delete"><i class="fas fa-trash-alt fa-lg text"></i>
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
                        <div class="small">{{$companies->links()}}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

