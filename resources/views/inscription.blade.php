@extends('layouts.layout_home')

@section('head')

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('inscription')

@section('content-public')
    @auth
    @else
    <div class="registration-container">
        <h2>Registration</h2>
        <form action="/inscrire" method="post" id="registration-form">
            @csrf
            <label for="nom_dutilisateur">User name</label><br>
            <input type="text" name="nom_dutilisateur" id="nom_dutilisateur" placeholder="Username" required><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="E-mail" required><br>

            <label for="mot_de_passe">password</label><br>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Password" required><br>

            <label for="password_confirmation">Confirm Password:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onkeyup="validatePassword()"><br>
            <span id="password-message"></span>

            <button id="submit-btn">register</button>
        </form>
    </div>

    @endauth
@endsection

@section('scripts')
    <script>
        function validatePassword() {
            var password = document.getElementById("mot_de_passe").value;
            var confirm_password = document.getElementById("password_confirmation").value;
            var message = document.getElementById("password-message");

            if (password === confirm_password) {
                message.innerHTML = "Les mots de passe correspondent";
                message.style.color = "green";
                document.getElementById("submit-btn").disabled = false;
            } else {
                message.innerHTML = "Les mots de passe ne correspondent pas";
                message.style.color = "red";
                document.getElementById("submit-btn").disabled = true;
            }
        }
    </script>
@endsection
