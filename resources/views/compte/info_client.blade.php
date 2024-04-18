@extends('layouts.layout_home')

@section('content')
    <div style="border: 2px solid rgb(14, 110, 38);">
        <h1>My Account</h1>
        <div style="border: 4px solid rgb(14, 146, 47);"></div>
        <h2>My Information:</h2>
        <p>Name: {{ $client->nom }} {{ $client->prenom }}</p>
        <p>Phone Number: {{ $client->num_tlf }}</p>
        <p>Email: {{ $client->email }}</p>
        <p>Address: {{ $client->adresse }}</p>
    </div>

    <div style="border: 2px solid rgb(14, 110, 38);">
        <h2>Account Actions:</h2>
        <ul>
            <li><a href="{{ route('compte.info_client') }}">My Information</a></li>
            <li><a href="{{ route('change_password') }}">Change Password</a></li>
            <li><a href="{{ route('change_email') }}">Change Email</a></li>
            <li><a href="{{ route('change_phone_number') }}">Change Phone Number</a></li>
        </ul>
    </div>

    <div style="border: 2px solid rgb(14, 110, 38);">
        <h2>Accounts:</h2>
        <table>
            <thead>
                <tr>
                    <th>Account </th>
                    <th>Current Balance</th>
                    <th>Last Transaction</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comptes as $compte)
                    <tr>
                        <td>{{ $compte->classeLibelle() }}</td>
                        <td>{{ $compte->solde }}</td>
                        <td>{{ $compte->derniere_trn }}</td>
                        <td>{{ $compte->statut }}</td>
                        <td>
                            @if ($compte->statut === 'bloque')
                                <form action="{{ route('compte.activate', $compte->num_cmt) }}" method="GET">
                                    @csrf
                                    <button type="submit">Activate Account</button>
                                </form>
                            @else
                                <form action="{{ route('compte.info_compte', $compte->num_cmt) }}" method="GET">
                                    <button type="submit">Access Account</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
