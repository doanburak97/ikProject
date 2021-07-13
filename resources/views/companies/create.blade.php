@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Add New Company</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}" title="Go back"> <i
                        class="fa fa-backward "></i> </a>
            </div>
        </div>
        <div class="clearfix pt-2"></div>
    </div>

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ old('name') }}" class=" form-control
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
                              placeholder="Address">{{ old('address') }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input name="phone" class="form-control @if($errors->has('phone')) is-invalid @endif "
                           value="{{ old('phone') }}" placeholder="Phone">

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
                    <input name="email" value="{{ old('email') }}"
                           class="form-control @if($errors->has('email')) is-invalid @endif "
                           placeholder="E-mail">

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
                    <input type="file" name="logo" class="form-control" value="{{ old('logo') }}" placeholder="Logo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Website:</strong>
                    <input name="website" class=" form-control @if($errors->has('website')) is-invalid @endif"
                           value="{{ old('website') }}"
                           placeholder="Website">

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
