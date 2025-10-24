<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
        </tr>
        @foreach ($data_buku as $index => $buku)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}</td>
            <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
