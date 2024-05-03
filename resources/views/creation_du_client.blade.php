@extends('layouts.layout_home')

@section('content')
    <h2>Client Creation</h2>
    
    @if ($errors->any())
        <div>
            <strong>Whoops! Something went wrong!</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form action="{{ route('client.create') }}" method="POST">
            @csrf
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required><br>

            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required><br>

            <label for="revenu">Revenu:</label><br>
            <input type="text" id="revenu" name="revenu" value="{{ old('revenu') }}" required><br>

            <label for="sexe">Sexe:</label><br>
            <select id="sexe" name="sexe" required>
                <option value="">Select your gender</option>
                <option value="homme" {{ old('sexe') == 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{ old('sexe') == 'femme' ? 'selected' : '' }}>Femme</option>
            </select><br>

            <label for="date_n">Date de naissance:</label><br>
            <input type="date" id="date_n" name="date_n" value="{{ old('date_n') }}" required><br>

            <label for="lieu_n">Lieu de naissance:</label><br>
            <input type="text" id="lieu_n" name="lieu_n" value="{{ old('lieu_n') }}" required><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>

            <label for="num_tlf">Numéro de téléphone:</label><br>
            <input type="text" id="num_tlf" name="num_tlf" value="{{ old('num_tlf') }}" required><br>

            <label for="adresse">Adresse:</label><br>
            <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required><br>

            <label for="select_wilaya">Wilaya</label><br>
            <select name="select_wilaya" id="select_wilaya" required>
                <option value="">Select a Wilaya</option>
                @foreach ($wilayas as $wilaya)
                    <option value="{{ $wilaya->wilaya }}">{{$wilaya->code}} - {{ $wilaya->wilaya }}</option>
                @endforeach
            </select><br>

            <label for="commune">Commune:</label><br>
            <input type="text" id="commune" name="commune" value="{{ old('commune') }}" required><br>

            <label for="daira">Daira:</label><br>
            <input type="text" id="daira" name="daira" value="{{ old('daira') }}" required><br>

            <label for="category">Catégorie:</label><br>
            <select id="category" name="category" onchange="toggleFields()" required>
                <option value="">Select a Category</option>
                <option value="Personne Physique" {{ old('category') == 'Personne Physique' ? 'selected' : '' }}>Personne Physique</option>
                <option value="Personne Morale" {{ old('category') == 'Personne Morale' ? 'selected' : '' }}>Personne Morale</option>
            </select><br>

            <div id="typeFields" style="display: none;">
                <label for="type">Type:</label><br>
                <select id="type" name="type" onchange="toggleTypeFields()">
                    <option value="">Select a Type</option>
                    <option value="Professionnel" {{ old('type') == 'Professionnel' ? 'selected' : '' }}>Professionnel</option>
                    <option value="Commercant" {{ old('type') == 'Commercant' ? 'selected' : '' }}>Commerçant</option>
                    <option value="Particulier" {{ old('type') == 'Particulier' ? 'selected' : '' }}>Particulier</option>
                </select><br>
            </div>

            <div id="formeJuridiqueFields" style="display: none;">
                <label for="forme_juridique_id">Forme Juridique:</label><br>
                <select id="forme_juridique_id" name="forme_juridique_id">
                    <option value="">Select Forme Juridique</option>
                    @foreach($formesJuridiques as $formeJuridique)
                        <option value="{{ $formeJuridique->id }}">({{$formeJuridique->forme_juridique}}) {{ $formeJuridique->libelle }}</option>
                    @endforeach
                </select><br>


                <label for="denomination">Dénomination:</label><br>
                <input type="text" id="denomination" name="denomination" value="{{ old('denomination') }}"><br>
            </div>

            <div id="activiteFields" style="display: none;">
                <label for="activite">Activité:</label><br>
                <input type="text" id="activite" name="activite" value="{{ old('activite') }}"><br>
            </div>

            <br>
            <button type="submit">Enregistrer</button>
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

            typeFields.style.display = "none";
            formeJuridiqueFields.style.display = "none";
            activiteFields.style.display = "none";

            if (category === "Personne Physique") {
                typeFields.style.display = "block";
            }
            else if (category === "Personne Morale") {
                formeJuridiqueFields.style.display = "block";
                activiteFields.style.display = "block";
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

        toggleFields();
        toggleTypeFields();

    </script>

@endsection