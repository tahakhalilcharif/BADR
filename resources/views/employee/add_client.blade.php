@extends('layouts.layout_emp')

@section('head')

<link rel="stylesheet" href="{{ asset('css/addclient.css') }}">
@endsection

@section('title', 'Client Registration')

@section('content-emp')
    <h2 class="section-title">Creat client</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-add">
    <form action="{{ route('employee.store_client') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
            </div>
            <div class="form-group">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="revenu" class="form-label">Revenu:</label>
                <input type="text" class="form-control" id="revenu" name="revenu" value="{{ old('revenu') }}" required>
            </div>
            <div class="form-group">
                <label for="sexe" class="form-label">Sexe:</label>
                <select class="form-select" id="sexe" name="sexe" required>
                    <option value="">Select your gender</option>
                    <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="date_n" class="form-label">Date de naissance:</label>
                <input type="date" class="form-control" id="date_n" name="date_n" value="{{ old('date_n') }}" required>
            </div>
            <div class="form-group">
                <label for="lieu_n" class="form-label">Lieu de naissance:</label>
                <input type="text" class="form-control" id="lieu_n" name="lieu_n" value="{{ old('lieu_n') }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="num_tlf" class="form-label">Numéro de téléphone:</label>
                <input type="text" class="form-control" id="num_tlf" name="num_tlf" value="{{ old('num_tlf') }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="adresse" class="form-label">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
            </div>
            <div class="form-group">
                <label for="select_wilaya" class="form-label">Wilaya:</label>
                <select class="form-select" id="select_wilaya" name="select_wilaya" required>
                    <option value="">Select a Wilaya</option>
                    @foreach ($wilayas as $wilaya)
                        <option value="{{ $wilaya->wilaya }}">{{$wilaya->code}} - {{ $wilaya->wilaya }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="commune" class="form-label">Commune:</label>
                <input type="text" class="form-control" id="commune" name="commune" value="{{ old('commune') }}" required>
            </div>
            <div class="form-group">
                <label for="daira" class="form-label">Daira:</label>
                <input type="text" class="form-control" id="daira" name="daira" value="{{ old('daira') }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="category" class="form-label">Catégorie:</label>
                <select class="form-select" id="category" name="category" onchange="toggleFields()" required>
                    <option value="">Select a Category</option>
                    <option value="Personne Physique" {{ old('category') == 'Personne Physique' ? 'selected' : '' }}>Personne Physique</option>
                    <option value="Personne Morale" {{ old('category') == 'Personne Morale' ? 'selected' : '' }}>Personne Morale</option>
                </select>
            </div>
            <div class="form-group" id="typeFields" style="display: none;">
                <label for="type" class="form-label">Type:</label>
                <select class="form-select" id="type" name="type" onchange="toggleTypeFields()">
                    <option value="">Select a Type</option>
                    <option value="Professionnel" {{ old('type') == 'Professionnel' ? 'selected' : '' }}>Professionnel</option>
                    <option value="Commercant" {{ old('type') == 'Commercant' ? 'selected' : '' }}>Commerçant</option>
                    <option value="Particulier" {{ old('type') == 'Particulier' ? 'selected' : '' }}>Particulier</option>
                </select>
            </div>
        </div>

        <div class="form-row" id="formeJuridiqueFields" style="display: none;">
            <div class="form-group">
                <label for="forme_juridique_id" class="form-label">Forme Juridique:</label>
                <select class="form-select" id="forme_juridique_id" name="forme_juridique_id">
                    <option value="">Select Forme Juridique</option>
                    @foreach($formesJuridiques as $formeJuridique)
                        <option value="{{ $formeJuridique->id }}">({{$formeJuridique->forme_juridique}}) {{ $formeJuridique->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="denominationFields" style="display: none;">
                <label for="denomination" class="form-label">Dénomination:</label>
                <input type="text" class="form-control" id="denomination" name="denomination" value="{{ old('denomination') }}">
            </div>
        </div>

        <div class="form-row" id="activiteFields" style="display: none;">
            <div class="form-group">
                <label for="activite" class="form-label">Activité:</label>
                <input type="text" class="form-control" id="activite" name="activite" value="{{ old('activite') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

@endsection

@section('scripts')
    <script>
        function toggleFields() {
            var category = document.getElementById("category").value;
            var typeFields = document.getElementById("typeFields");
            var formeJuridiqueFields = document.getElementById("formeJuridiqueFields");
            var activiteFields = document.getElementById("activiteFields");
            var denominationFields = document.getElementById("denominationFields");

            typeFields.style.display = "none";
            formeJuridiqueFields.style.display = "none";
            activiteFields.style.display = "none";
            denominationFields.style.display = "none";

            if (category === "Personne Physique") {
                typeFields.style.display = "block";
            } else if (category === "Personne Morale") {
                formeJuridiqueFields.style.display = "block";
                activiteFields.style.display = "block";
                denominationFields.style.display = "block";
            }
        }

        function toggleTypeFields() {
            var type = document.getElementById("type").value;
            var activiteFields = document.getElementById("activiteFields");

            activiteFields.style.display = "none";

            if (type === "Commercant" || type === "Professionnel") {
                activiteFields.style.display = "block";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
            toggleTypeFields();
        });
    </script>
@endsection
