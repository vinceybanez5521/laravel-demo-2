@extends('layouts.app')

@section('content')
    <div class="container">
            {{-- Hide element if unauthenticated --}}
        @if (Auth::user())
            <a href="{{ route('employee.create') }}">Create New Employee</a>
        @endif

        <h1>Employee List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->full_name }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->email }}</td>
                        {{-- <td>
                            <a href="/employees/{{ $employee->id }}">View</a>
                        </td> --}}
                        <td>
                            <a href="{{ route('employee.show', $employee->id) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $employees->links() }}
        </div>
    </div>
@endsection