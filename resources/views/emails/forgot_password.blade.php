<!DOCTYPE html>
<html>
<head>
 <title>Forgot Password</title>
</head>
<body>
 
 <h1>Forgot Password</h1>
 <p>Hallo {{ $user->email }}, Kode Verifikasi akun anda adalah: {{ $user->kode_verifikasi_email }} </p>
 {{-- http://localhost/goldenhour-laravel/public/api/user/forgot-password?email=wickj9211@gmail.com --}}
</body>
</html> 