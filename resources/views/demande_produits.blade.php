<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Order one of our cards</h3>
    <form action="{{ route('produit.store')}}" method="POST">
        @csrf
        <label for=""></label>
    </form>
</body>
</html>