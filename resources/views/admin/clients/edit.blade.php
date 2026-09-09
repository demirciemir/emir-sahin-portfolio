@extends('layouts.admin')

@section('title', 'Marka Düzenle')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Marka Düzenle: {{ $client->name }}</h1>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left me-2"></i> Geri Dön</a>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label" style="color: rgba(255,255,255,0.7);">Marka Adı <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $client->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="slug" class="form-label" style="color: rgba(255,255,255,0.7);">Seo URL (Slug) <span class="text-muted" style="font-size: 0.8rem;">(Değiştirmek isterseniz düzenleyin)</span></label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $client->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="title" class="form-label" style="color: rgba(255,255,255,0.7);">Kategori / Alt Başlık <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $client->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label" style="color: rgba(255,255,255,0.7);">Açıklama</label>
                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $client->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="logo_image" class="form-label" style="color: rgba(255,255,255,0.7);">Logo Güncelle <span style="color: rgba(255,255,255,0.4);">(Max: 10MB)</span></label>
                
                @if($client->logo_image)
                    <div class="mb-3 p-3" style="background: rgba(0,0,0,0.2); border-radius: 8px; display: inline-block;">
                        <img src="{{ asset($client->logo_image) }}" alt="{{ $client->name }}" style="max-height: 80px;">
                    </div>
                @endif
                
                <input type="file" name="logo_image" id="logo_image" class="form-control @error('logo_image') is-invalid @enderror" accept="image/*">
                @error('logo_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="d-block mt-2" style="color: rgba(255,255,255,0.4);">
                    <i class="fa-solid fa-circle-info me-1"></i> Yeni bir görsel seçerseniz eski görsel otomatik olarak silinir.<br>
                    <i class="fa-solid fa-crop-simple me-1 mt-1"></i> <strong>Tavsiye Edilen Boyut:</strong> Ana sayfadaki kutuların yapısı gereği <strong>Dikey (Portrait)</strong> görseller daha iyi sonuç verir. (Örn: 800x1000px veya 4:5 oranı)
                </small>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg px-5">Değişiklikleri Kaydet</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('name').addEventListener('input', function() {
            let name = this.value;
            let slug = name.toLowerCase()
                           .replace(/ğ/g, 'g')
                           .replace(/ü/g, 'u')
                           .replace(/ş/g, 's')
                           .replace(/ı/g, 'i')
                           .replace(/ö/g, 'o')
                           .replace(/ç/g, 'c')
                           .replace(/[^a-z0-9\s-]/g, '')
                           .trim()
                           .replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
