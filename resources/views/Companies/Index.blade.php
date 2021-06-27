@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

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
    </div>
    <hr>
    <table class="display" id="companyTbl">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Website</th>
                <th width="150px">Action</th>
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
{{--                    <td>{{ $company->logo }}</td>--}}
                    <td><img src="{{ asset('storage/app/public/' . $company->logo) }}" alt="Image"></td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">

                            <a href="{{ route('companies.show', $company->id) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>

                            <a href="{{ route('companies.edit', $company->id) }}">
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
        @endforeach
        </tbody>
    </table>

    {!! $companies->links() !!}

@endsection

@push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#companyTbl').DataTable();
        });
    </script>
@endpush
