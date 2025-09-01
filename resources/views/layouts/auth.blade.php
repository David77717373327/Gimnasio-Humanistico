<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    {{-- Tus estilos personalizados --}}
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>LOGIN GIMNASIO HUMANÍSTICO</title>
    {{-- Bootstrap (si lo usas en tu login) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Otros estilos -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Logo.png') }}">
</head>
<body>
    @auth
    {{ Auth::user()->name }}
@endauth
    @yield('content')
</body>
</html>
