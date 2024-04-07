<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Employee</title>
</head>
<body>
    <h1>Create Employee</h1>

    <form action="{{ route('employee.store') }}" method="POST">
        @csrf

        <p>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first_name">
        </p>
        <p>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last_name">
        </p>
        <p>
            <label>Gender</label>
            <input type="radio" id="male" name="gender" value="Male" checked>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </p>
        <p>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email">
        </p>
        <input type="submit" value="Save">
    </form>
</body>
</html>