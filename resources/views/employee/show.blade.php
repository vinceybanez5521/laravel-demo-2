<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Profile</title>
</head>
<body>
    <h1>Employee Profile</h1>
    <h3>{{ $id }}</h3>
    <h3>{{ $first_name . ' ' . $last_name }}</h3>
    <h3>{{ $gender }}</h3>
    <h3>{{ $email }}</h3>
</body>
</html>