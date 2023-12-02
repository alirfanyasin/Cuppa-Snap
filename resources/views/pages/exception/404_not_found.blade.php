<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>404 Not Found</h1>

  <a href="{{ Auth::user()->hasRole('kasir') ? '/app/dashboard' : '/dashboard' }}">Back to Dashboard</a>
</body>

</html>
