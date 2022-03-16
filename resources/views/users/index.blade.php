@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-12 p-4">
            <h4 class="mb-2">Users</h4>
            <a class="btn btn-primary" href="{{ route('users.create') }}">New User</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Show</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a class="btn btn-primary" href="{{ route('users.show',$user->id) }}">Show</a></td>
                    <td><a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a></td>
                    <td><form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
