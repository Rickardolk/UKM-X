@extends('layouts.auth')

@section('title', 'Login Admin - UKM X')

@push('styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="auth-page">
    <div class="auth-card">
        <h1 class="auth-card__title">Login Admin</h1>
        <p class="auth-card__desc">
            Masukkan email dan password sesuai untuk dapat mengakses dashboard admin
        </p>

        <form action="{{ route('admin.dashboard') }}" method="GET">
            <div class="auth-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="admin@UNIVX.ac.id" autocomplete="username" />
            </div>

            <div class="auth-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;"
                    autocomplete="current-password" />
            </div>

            <button type="submit" class="btn-auth-submit">Masuk</button>
        </form>
    </div>
</div>

@endsection