<h2>Data User</h2>
<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Tinggi Awal</th>
            <th>Status Akun</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $u)
        <tr>
            <td>{{ $u->user_id }}</td>
            <td>{{ $u->nama }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->tanggal_lahir }}</td>
            <td>{{ $u->jenis_kelamin }}</td>
            <td>{{ $u->tinggi_badan_awal }}</td>
            <td>{{ $u->status_akun }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7">Belum ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>
