@extends('layouts.layout_home')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info_client.css') }}">
@endsection
@section('title', 'information_client')

@section('content')

<div class="account-info">
    <h1>My Information</h1>
    <div class="divider"></div>
    <p>Name: {{ $client->nom }} {{ $client->prenom }}</p>
    <p>Phone Number: {{ $client->num_tlf }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Address: {{ $client->adresse }}</p>
    <h1>My Accounts</h1>
    <div class="divider"></div>
    <table>
        <thead>
            <tr>
                <th>Account</th>
                <th>Current Balance</th>
                <th>Last Transaction</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comptes as $compte)
                <tr>
                    <td><a href="{{ route('compte.info_compte', ['num_cmt' => $compte->num_cmt]) }}">{{ $compte->classeLibelle() }}</a></td>
                    <td>{{ $compte->solde }}</td>
                    <td>{{ $compte->derniere_trn }}</td>
                    <td>{{ $compte->statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



    <div class="account-actions">
        <h2>Account Actions:</h2>
        <ul>

            <li><a href="{{ route('change_password') }}">Change Password</a></li>
            <li><a href="{{ route('change_email') }}">Change Email</a></li>
            <li><a href="{{ route('change_phone_number') }}">Change Phone Number</a></li>
           <li> <a href="{{ route('new_account_form') }}">Create New Account</a></li>

        </ul>
    </div>
  

@endsection

@section('scripts')
<script>
    document.getElementById('create-account-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector('.account-info').style.display = 'none';
        document.querySelector('.create-account-form').style.display = 'block';
    });
</script>
@endsection
