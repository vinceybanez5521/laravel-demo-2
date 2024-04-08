@extends('layouts.app')

@section('content')
    <h1>Employee Profile</h1>
    <h3>{{ $id }}</h3>
    <h3>{{ $first_name . ' ' . $last_name }}</h3>
    <h3>{{ $gender }}</h3>
    <h3>{{ $email }}</h3>

    <p>
        <a href="{{ route('employee.index') }}">Employee List</a>
    </p>
    @if (Auth::user())
        <p>
            <a href="{{ route('employee.edit', $id) }}">Edit Employee</a>
        </p>
        <p>
            <a href="#" onclick="document.getElementById('deleteForm').submit()">Delete Employee</a>
            
            <form action="{{ route('employee.destroy', $id) }}" method="POST" id="deleteForm">
                @method('DELETE')
                @csrf
            </form>
        </p>
    @endif
@endsection