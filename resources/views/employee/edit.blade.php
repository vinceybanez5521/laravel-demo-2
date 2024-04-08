@include('partials.header')

    <h1>Edit Employee</h1>

    <form action="{{ route('employee.update', $employee) }}" method="POST">
        @method('PUT')
        @csrf

        <p>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first_name" value="{{ $employee->first_name }}">
        </p>
        <p>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last_name" value="{{ $employee->last_name }}">
        </p>
        <p>
            <label>Gender</label>
            <input type="radio" id="male" name="gender" value="Male" {{ $employee->gender === 'Male' ? 'checked' : null }}>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female" {{ $employee->gender === 'Female' ? 'checked' : null }}>
            <label for="female">Female</label>
        </p>
        <p>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ $employee->email }}">
        </p>
        <input type="submit" value="Submit">
    </form>

@include('partials.footer')