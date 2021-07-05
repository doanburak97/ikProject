@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    {{--    @if ($errors->any())--}}
    {{--        <div class="alert alert-danger">--}}
    {{--            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
    {{--            <ul>--}}
    {{--                @foreach ($errors->all() as $error)--}}
    {{--                    <li>{{ $error }}</li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class=" form-control
                           @if($errors->has('first_name')) is-invalid @endif" placeholder="First Name">

                    <!-- Error -->
                    @if($errors->has('first_name'))

                        <div class="small text-danger">
                            {{ $errors->first('first_name') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class=" form-control
                           @if($errors->has('last_name')) is-invalid @endif" placeholder="Last Name">

                    <!-- Error -->
                    @if($errors->has('last_name'))

                        <div class="small text-danger">
                            {{ $errors->first('last_name') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif "
                           placeholder="{{ $employee->email }}" value="{{ $employee->email }}">

                    <!-- Error -->
                    @if($errors->has('email'))

                        <div class="small text-danger">
                            {{ $errors->first('email') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" class=" form-control @if($errors->has('phone')) is-invalid @endif"
                           placeholder="{{ $employee->phone }}"
                           value="{{ $employee->phone }}">

                    <!-- Error -->
                    @if($errors->has('phone'))

                        <div class="small text-danger">
                            {{ $errors->first('phone') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <!-- select -->
                <div class="form-group">
                    <label>Company</label>
                    <select class="custom-select" name="company_id" {{ $errors->has('company_id') ? 'error' : '' }}>
                        @foreach($companies as $company)
                            <option @if($employee->company->name === $company->name) selected
                                    @endif value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                    <!-- Error -->
                    @if($errors->has('company_id'))

                        <div class="small text-danger">
                            {{ $errors->first('company_id') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
