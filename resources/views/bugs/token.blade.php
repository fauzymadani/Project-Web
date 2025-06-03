<!DOCTYPE html>
<html>
<head>
    <title>Masukkan Token Edit</title>
</head>
<body>
    <h1>Edit Bug dengan Token</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bugs.process_token') }}">
        @csrf
        <label for="token">Masukkan Token Edit:</label><br>
        <input 
            type="text" 
            id="token" 
            name="token" 
            required 
            maxlength="32" 
            placeholder="Masukkan token 32 karakter" 
            style="width: 300px;" 
            autofocus
        >
        <br><br>
        <button type="submit">Lanjutkan</button>
    </form>

    <p><a href="{{ route('bugs.index') }}">Kembali ke daftar bug</a></p>
</body>
</html>
