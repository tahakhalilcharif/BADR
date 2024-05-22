@extends('layouts.layout_emp')

@section('head')
<link rel="stylesheet" href="{{ asset('css/employee.css') }}">
<link rel="stylesheet" href="{{ asset('css/homemp.css') }}">

@endsection

@section('title', 'Employee Dashboard')

@section('content-emp')

<h1 class="dashboard-title">Employee Dashboard</h1>

<div class="container">

       

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Clients</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $clientCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Total Demands</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $demandCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Unactivated Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $unactivatedUsersCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Accounts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $accountsCount }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
