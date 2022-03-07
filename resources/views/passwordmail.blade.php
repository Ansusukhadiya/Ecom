<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>

<p>{{ $email }}</p>
<p>Click on the link below to create new password</p>
<a href="{{route('pwreset', $uuid)}}">Reset Password</a>
</body>
</html>
