<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
</head>
<body>

<h3>Biodata</h3>
<form action="{{route('biodata.simpan')}}" method="post">
@csrf
<p>
    Nama : <br/>
    <input type="text" name="nama" placeholder=" Nama">
</p>
<p>
    <input type="submit" value="Simpan">
</p>
</form>

</body>
</html>