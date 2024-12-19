<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@auth
        <h1>Welcome to the Dashboard, {{ Auth::user()->name }}</h1>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @else
        <script>window.location = "{{ route('login') }}";</script>
        @endauth
        <p>Select a module from the sidebar to manage data.</p>
@endsection
