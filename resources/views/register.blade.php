<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Pengguna</title>
</head>
<body>
    <form action="{{ route('greeting') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama">
        <button type="submit">Daftar</button>
    </form>
</body>
</html>