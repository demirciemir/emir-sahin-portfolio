@extends('layouts.admin')

@section('title', 'Sosyal Medya Hesabı Düzenle')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Sosyal Medya Düzenle: {{ $socialMedia->name }}</h1>
        <a href="{{ route('admin.social-media.index') }}" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left me-2"></i> Geri Dön</a>
    </div>

    <div class="admin-card" style="max-width: 600px;">
        <form action="{{ route('admin.social-media.update', $socialMedia) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Platform Adı <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $socialMedia->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon_class" class="form-label">İkon Sınıfı (FontAwesome) <span class="text-danger">*</span></label>
                    <input type="text" name="icon_class" id="icon_class" class="form-control @error('icon_class') is-invalid @enderror" value="{{ old('icon_class', $socialMedia->icon_class) }}" required>
                    <div class="form-text text-white-50">Örnek: <code>fa-brands fa-instagram</code></div>
                    @error('icon_class')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Profil URL Adresi</label>
                    <input type="url" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $socialMedia->url) }}" placeholder="https://instagram.com/...">
                    @error('url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $socialMedia->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Sitede Göster (Aktif)</label>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Kaydet</button>
                </div>
            </form>
        </div>
@endsection
