<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        {{-- Memuat CSS --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body>
        {{-- Container utama dengan latar biru --}}
        <div class="guest-container">
            {{-- Kotak putih di tengah --}}
            <div class="login-box">
                {{-- Di sinilah konten dari login.blade.php akan ditampilkan --}}
                {{ $slot }}
            </div>
        </div>
    </body>
</html>