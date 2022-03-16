@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <!-- Template files -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Edit test </h4>
            <form action="{{ route('manager.setTestGrade', $test->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <strong>User name:</strong>
                    <input name="full_name" value="{{ $test->full_name }}" class="form-control" readonly>
                    @if ($errors->has('full_name'))
                        <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong >Test date:</strong>
                    <input type="datetime-local" name="test_date"
                           value="{{ date('Y-m-d\TH:i:s', strtotime($test->test_date)) }}"
                           min="2021-01-01" max="2023-12-31" readonly>
                </div>
                <div class="mb-3">
                    <strong>Test location:</strong>
                    <input name="test_location" value="{{ $test->test_location }}" class="form-control" readonly>
                    @if ($errors->has('test_location'))
                        <span class="text-danger text-left">{{ $errors->first('test_location') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong class="text-danger">Test grade:</strong>
                    <input name="grade" value="{{ $test->grade }}" class="form-control">
                    @if ($errors->has('grade'))
                        <span class="text-danger text-left">{{ $errors->first('grade') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test evaluation criteria:</strong>
                    <input name="evaluation_criteria" value="{{ $test->evaluation_criteria }}" class="form-control" readonly>
                    @if ($errors->has('evaluation_criteria'))
                        <span class="text-danger text-left">{{ $errors->first('evaluation_criteria') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Manager:</strong>
                    <input name="user_id" value="{{ $test->user->name }}" class="form-control" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>
    </div>
@endsection
