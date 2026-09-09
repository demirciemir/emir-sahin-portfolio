@extends('layouts.admin')

@section('title', 'Yeni Yetkili Ekle')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Yeni Yetkili Ekle</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left me-2"></i> Geri Dön</a>
    </div>

    <div class="admin-card" style="max-width: 600px;">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label" style="color: rgba(255,255,255,0.7);">İsim Soyisim <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="form-label" style="color: rgba(255,255,255,0.7);">Kullanıcı Adı <span class="text-danger">*</span></label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="d-block mt-2" style="color: rgba(255,255,255,0.4);">Sisteme giriş yaparken bu kullanıcı adı kullanılacaktır.</small>
            </div>

            <div class="mb-5">
                <label for="password" class="form-label" style="color: rgba(255,255,255,0.7);">Şifre <span class="text-danger">*</span></label>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required style="padding-right: 40px;">
                    <button type="button" onclick="togglePassword('password', this)" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.4); cursor: pointer; padding: 0;">
                        <i class="fa-regular fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2 p-3 rounded" style="background: rgba(255,255,255,0.05); font-size: 0.85rem; color: rgba(255,255,255,0.6);">
                    <i class="fa-solid fa-shield-halved text-warning me-1"></i> <strong>Güvenlik Kuralları:</strong><br>
                    Şifreniz; 
                    <ul class="mb-0 mt-1 ps-3">
                        <li>En az <strong>8 karakter</strong> uzunluğunda olmalı,</li>
                        <li>En az 1 <strong>büyük harf</strong> ve 1 <strong>küçük harf</strong> içermeli,</li>
                        <li>En az 1 <strong>rakam</strong> içermeli,</li>
                        <li>En az 1 <strong>özel karakter</strong> (örneğin: @, $, !, %, *, ?, &) içermelidir.</li>
                    </ul>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg px-5">Kaydet</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection
