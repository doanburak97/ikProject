@extends('layouts.layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="fa-pull-left">
                <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">Add Company</a>
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
                        <table id="example2" class="table small  table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               aria-describedby="example2_info">
                            <thead class="bg-gray-dark">
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

