@auth
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Account information</h1>
    <div class="container">
        <h1>Account Details</h1>
        <p>ID: {{ $compte->num_cmt }}</p>
        <p>Solde: {{ $compte->solde }}</p>
        <!-- Add more details as needed -->
    </div>
</body>
</html>
@endauth