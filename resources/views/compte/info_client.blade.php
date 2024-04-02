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
    <div style = "border: 2px solid rgb(14, 110, 38);">
        
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        
        <h2>Your Information:</h2>
        <p>Name: {{ $client->nom }} {{ $client->prenom }}</p>
        <p>Phone Number: {{ $client->num_tlf }}</p>
        <p>Email: {{$client->email}}</p>
        <p>Address: {{$client->adresse}}</p>

        <table>
            <thead>
                <tr>
                    <th>Acocunt Number</th>
                    <th>Current Balance</th>
                    <th>Last Transaction</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comptes as $compte)
                    <tr>
                        <td>{{ $compte->num_cmt }}</td>
                        <td>{{ $compte->solde }}</td>
                        <td>{{ $compte->derniere_trn }}</td>
                        <td>{{ $compte->statut }}</td>
                        <td>
                            <form action="{{ route('compte.info_compte', $compte->num_cmt) }}" method="GET">
                                <button type="submit">Access Account</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endauth