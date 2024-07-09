<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug</title>
</head>
<body>
    <h1>Debug Information</h1>
    <ul>
        <li>CSRF Token: {{ csrf_token() }}</li>
        <li>Session Data: {{ session()->all() }}</li>
        <li>Errors: {{ $errors->any() ? $errors->first() : 'No errors' }}</li>
    </ul>
</body>
</html>
