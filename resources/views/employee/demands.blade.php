@extends('layouts.layout_emp')

@section('content-emp')
    <h1>Demands</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Status</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demands as $demand)
                <tr>
                    <td>{{ $demand->id }}</td>
                    <td>{{ $demand->type }}</td>
                    <td>{{ $demand->status }}</td>
                    <td>{{ $demand->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
