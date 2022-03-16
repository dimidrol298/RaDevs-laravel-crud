@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Create user </h4>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <strong>User name:</strong>
                    <input name="name" class="form-control">
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>User email:</strong>
                    <input name="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>User password:</strong>
                    <input name="password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
