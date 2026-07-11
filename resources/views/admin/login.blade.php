<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('css/admin-login.css') }}" rel="stylesheet" />
</head>
<body>

    <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-card">

            {{-- Heading --}}
            <div class="text-center mb-4">
                <h1 class="login-title">Login Admin</h1>
                <p class="login-subtitle">
                    Masukkan email dan password sesuai untuk<br>
                    dapat mengakses dashboard admin
                </p>
            </div>

            {{-- Alert Error (jika login gagal) --}}
            @if(session('error'))
                <div class="alert alert-danger rounded-3 text-center py-2 small">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Form --}}
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label class="login-label" for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="login-input @error('email') is-invalid @enderror"
                        placeholder="admin@UNIVX.ac.id"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    />
                    @error('email')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="login-label" for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="login-input @error('password') is-invalid @enderror"
                        placeholder="••••••••••••"
                        required
                    />
                    @error('password')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Button --}}
                <button type="submit" class="login-btn w-100">
                    Masuk
                </button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>