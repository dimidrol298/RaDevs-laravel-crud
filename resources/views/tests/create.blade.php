     @extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <!-- Template files -->
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Create test </h4>
            <form action="{{ route('tests.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <strong>User name:</strong>
                    <input name="full_name" class="form-control">
                    @if ($errors->has('full_name'))
                        <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test date:</strong>
                    <input type="datetime-local" name="test_date"
                           min="2021-01-01" max="2023-12-31">
                </div>
                <div class="mb-3">
                    <strong>Test location:</strong>
                    <input name="test_location" class="form-control">
                    @if ($errors->has('test_location'))
                        <span class="text-danger text-left">{{ $errors->first('test_location') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test grade:</strong>
                    <input name="email" class="form-control">
                    @if ($errors->has('grade'))
                        <span class="text-danger text-left">{{ $errors->first('grade') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Test evaluation criteria:</strong>
                    <input name="email"  class="form-control">
                    @if ($errors->has('evaluation_criteria'))
                        <span class="text-danger text-left">{{ $errors->first('evaluation_criteria') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Manager:</strong>
                    <select class="form-control" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}"> {{ $user->name }} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
