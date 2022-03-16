@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <!-- Template files -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Edit test </h4>
            <form action="{{ route('tests.update', $test->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <strong>User name:</strong>
                    <input name="full_name" value="{{ $test->full_name }}" class="form-control">
                    @if ($errors->has('full_name'))
                        <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test date:</strong>
                    <input type="datetime-local" name="test_date"
                           value="{{ date('Y-m-d\TH:i:s', strtotime($test->test_date)) }}"
                           min="2021-01-01" max="2023-12-31">
                </div>
                <div class="mb-3">
                    <strong>Test location:</strong>
                    <input name="test_location" value="{{ $test->test_location }}" class="form-control">
                    @if ($errors->has('test_location'))
                        <span class="text-danger text-left">{{ $errors->first('test_location') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test grade:</strong>
                    <input name="email" value="{{ $test->grade }}" class="form-control">
                    @if ($errors->has('grade'))
                        <span class="text-danger text-left">{{ $errors->first('grade') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test evaluation criteria:</strong>
                    <input name="email" value="{{ $test->evaluation_criteria }}" class="form-control">
                    @if ($errors->has('evaluation_criteria'))
                        <span class="text-danger text-left">{{ $errors->first('evaluation_criteria') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Manager:</strong>
                    <select class="form-control" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                            @isset($test->user->id)
                                {{ ( $user->id === $test->user->id) ? 'selected' : '' }}
                            @endisset
                            > {{ $user->name }} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                        <span class="text-danger text-left">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
