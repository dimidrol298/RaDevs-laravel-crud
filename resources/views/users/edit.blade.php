@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Edit user - {{ $user->name }} </h4>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <strong>User name:</strong>
                    <input name="name" value="{{ $user->name }}" class="form-control">
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>User email:</strong>
                    <input name="email" value="{{ $user->email }}" class="form-control">
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
