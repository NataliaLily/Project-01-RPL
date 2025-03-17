<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H3>Natalia Lily</H3>
    <form action="{{route('biodata.simpan')}}" method="post">
        @csrf
        <p>
            nama : <br/>
            <input type="text" name="nama" placeeholder= "nama">
        </p>
        <p>
            <input type="submit" value = "Simpan">
        </p>
        <p>
            password : <br/>
            <input type="password" name="password" placeeholder= "password">
            </p>
            <p>
                <input type="submit" value = "Simpan">
        </p>
    </form>

</body>
</html>