<x-guest-layout>
    {{-- Logo di atas form --}}
    <div class="login-logo">
        <a href="/">
            {{-- Ganti dengan path logo Anda dari folder resources/img --}}
            <img src="{{ Vite::asset('resources/img/logo2.png') }}" alt="Logo Giat Kedinasan">
        </a>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="input-group mt-4">
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        {{-- Tombol Login --}}
        <div class="mt-8">
            <button type="submit" class="btn-login">
                {{ __('Log in') }}
            </button>
        </div>

        {{-- Link Lupa Password (opsional) --}}
        @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <a class="link-forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>