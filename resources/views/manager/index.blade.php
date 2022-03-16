@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Tests</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Full name</th>
                    <th scope="col">Testing date</th>
                    <th scope="col">Testing location</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Evaluation criteria</th>
                    <th scope="col">Manager</th>
                    <th scope="col">Show</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tests as $test)
                    <tr>
                        <th scope="row">{{ $test->full_name }}</th>
                        <td>{{ $test->test_date }}</td>
                        <td>{{ $test->test_location }}</td>
                        <td>{{ $test->grade }}</td>
                        <td>{{ $test->evaluation_criteria }}</td>
                        <td>{{ $test->user->name }}</td>
                        <td><a class="btn btn-primary" href="{{ route('manager.show', $test->id) }}">Show</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
