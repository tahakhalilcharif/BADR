@extends('layouts.layout_home')

@section('content')
    <form action="/open_account" method="POST">
        @csrf
        <div>
            <label for="classe">Select Class:</label>
            <select name="classe" id="classe">
                @foreach ($classes as $classe)
                    <option value="{{ $classe->classe }}">{{ $classe->label }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="agence">Agence:</label>
            <select name="agence" id="agence" required>
                @foreach ($agences as $agence)
                    <option value="{{ $agence->code_agence }}">{{ $agence->nom_agence }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Open Account</button>
    </form>
@endsection