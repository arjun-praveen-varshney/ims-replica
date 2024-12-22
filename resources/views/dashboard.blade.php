<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content-card">
            <div class="card-header">
                <h1 style="font-weight: 600; font-size: 20px;">Dashboard</h1>
            </div>
            <div style="padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px;">
                <p style="font-weight: 500; font-size: 16px;">Welcome to the dashboard!</p>
                <p style="font-weight: 500; font-size: 16px;">Select a module from the left to get started.</p>
            </div>
        </div>
@endsection
