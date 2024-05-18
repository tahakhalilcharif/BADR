@extends('layouts.layout_home')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
@section('title', 'information_client')

@section('content')
<form action="/open_account" method="POST" class="styled-form">
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
