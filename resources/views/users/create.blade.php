<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
        }
        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 8px;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .radio-option input[type="radio"] {
            width: auto;
            margin: 0;
        }
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }
        .btn {
            flex: 1;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
        .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        .note {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
        }
        .note p {
            font-size: 13px;
            color: #555;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah User Baru</h1>
        <p class="subtitle">Lengkapi form di bawah untuk menambahkan user baru</p>
        
        <div class="note">
            <p><strong>Catatan:</strong></p>
            <p>• Password minimal 6 karakter</p>
            <p>• Email harus unik (belum terdaftar)</p>
            <p>• Tinggi badan dalam satuan cm</p>
        </div>
        
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Nama Lengkap <span style="color: red;">*</span></label>
                <input type="text" name="nama" value="{{ old('nama') }}" 
                       placeholder="Masukkan nama lengkap" required>
                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Email <span style="color: red;">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" 
                       placeholder="contoh@email.com" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Password <span style="color: red;">*</span></label>
                <input type="password" name="password" 
                       placeholder="Minimal 6 karakter" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin <span style="color: red;">*</span></label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="laki" name="jenis_kelamin" 
                               value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                        <label for="laki" style="margin: 0;">Laki-laki</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="perempuan" name="jenis_kelamin" 
                               value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                        <label for="perempuan" style="margin: 0;">Perempuan</label>
                    </div>
                </div>
                @error('jenis_kelamin')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Tinggi Badan Awal (cm)</label>
                <input type="number" name="tinggi_badan_awal" 
                       value="{{ old('tinggi_badan_awal') }}" 
                       placeholder="Contoh: 170" min="100" max="250">
                @error('tinggi_badan_awal')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Status Akun</label>
                <select name="status_akun">
                    <option value="aktif" {{ old('status_akun') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status_akun') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status_akun')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>