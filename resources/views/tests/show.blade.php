@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Tests - {{ $test->full_name }}</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Full name</th>
                    <th scope="col">Testing date</th>
                    <th scope="col">Testing location</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Evaluation criteria</th>
                    <th scope="col">Manager</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{ $test->full_name }}</th>
                    <td>{{ $test->test_date }}</td>
                    <td>{{ $test->test_location }}</td>
                    <td>{{ $test->grade }}</td>
                    <td>{{ $test->evaluation_criteria }}</td>
                    <td>{{ $test->user->name }}</td>
                    <td><a class="btn btn-primary" href="{{ route('tests.edit', $test->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('tests.destroy', $test->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
