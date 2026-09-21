<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Home</title>
</head>
<body>
    <h1>Username: {{ $username }}</h1>
    <p>Last Login: {{ $last_login }}</p>

    <h3>Riwayat Pendidikan:</h3>
    <ul>
        @foreach($list_pendidikan as $pendidikan)
            <li>{{ $pendidikan }}</li>
        @endforeach
    </ul>
</body>
</html>