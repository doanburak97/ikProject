@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class=" form-control
                           @if($errors->has('name')) is-invalid @endif" placeholder="Name">

                    <!-- Error -->
                    @if($errors->has('name'))

                        <div class="small text-danger">
                            {{ $errors->first('name') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:50px" name="address"
                              placeholder="Introduction">{{ $company->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" class=" form-control @if($errors->has('phone')) is-invalid @endif"
                           placeholder="{{ $company->phone }}"
                           value="{{ $company->phone }}">

                    <!-- Error -->
                    @if($errors->has('phone'))

                        <div class="small text-danger">
                            {{ $errors->first('phone') }}
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>E-mail:</strong>
                    <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif "
                           placeholder="{{ $company->email }}"
                           value="{{ $company->email }}">

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
                    <strong>Logo:</strong>
                    <input type="file" name="logo" class="form-control" placeholder="Logo">
                    <br>
                    <img src="/images/{{ $company->logo }}" width="200px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input type="text" name="website" class=" form-control @if($errors->has('website')) is-invalid @endif"
                           placeholder="{{ $company->website }}"
                           value="{{ $company->website }}">

                    <!-- Error -->
                    @if($errors->has('website'))

                        <div class="small text-danger">
                            {{ $errors->first('website') }}
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


