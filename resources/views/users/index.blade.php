<!DOCTYPE html>
<html>
<head>
    <title>Data User HeightUp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .alert {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            animation: slideDown 0.3s ease;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .btn-edit {
            background-color: #ffc107;
            color: #000;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Flash Message -->
    @if(session('success'))
    <div class="alert alert-success">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div class="header-actions">
        <h1>📊 Data User Management</h1>
        <a href="{{ route('users.create') }}" class="btn-add">
            ➕ Tambah User Baru
        </a>
    </div>

    <!-- Form Pencarian & Filter -->
    <form method="GET" action="{{ url('/users') }}">
        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Cari nama user...">
        <button type="submit">Cari</button>

        <select name="jenis_kelamin" onchange="this.form.submit()">
            <option value="semua" {{ $filter_gender == 'semua' ? 'selected' : '' }}>Semua</option>
            <option value="Laki-laki" {{ $filter_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $filter_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </form>

    <!-- Tabel User -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Tinggi Badan Awal</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
        @forelse ($users as $index => $user)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->jenis_kelamin }}</td>
            <td>{{ $user->tinggi_badan_awal }} cm</td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
           <td>
    <div class="action-buttons">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">
            ✏️ Edit
        </a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
              style="display: inline;"
              onsubmit="return confirm('Yakin ingin menghapus user {{ $user->nama }}?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">🗑️ Hapus</button>
        </form>
    </div>
</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align: center;">Tidak ada data ditemukan</td>
        </tr>
        @endforelse
    </table>

    <!-- Statistik -->
    <h3>Statistik User</h3>
    <ul>
        <li>Total User: {{ $statistik['total_user'] }}</li>
        <li>Rata-rata Tinggi Badan Awal: {{ number_format($statistik['rata_tinggi'], 2) }} cm</li>
        <li>Tinggi Badan Tertinggi: {{ $statistik['tinggi_max'] }} cm</li>
        <li>Tinggi Badan Terendah: {{ $statistik['tinggi_min'] }} cm</li>
    </ul>
</body>
</html>