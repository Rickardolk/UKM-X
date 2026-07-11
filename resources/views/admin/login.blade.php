<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - UKM X</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="login-card">
        <h2 class="text-center mb-2">Login Admin</h2>
        <p class="text-center text-muted mb-4">Masukkan email dan password sesuai untuk dapat mengakses dashboard admin</p>

        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="admin@UNIVX.ac.id" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="************" required>
            </div>
            <button type="submit" class="btn btn-masuk-admin">Masuk</button>
        </form>
    </div>

</body>

</html>