@extends('layouts.admin')

@section('title', 'Yeni Proje Ekle')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Yeni Proje Ekle</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left me-2"></i> Geri Dön</a>
    </div>

    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="client_id" class="form-label" style="color: rgba(255,255,255,0.7);">Ait Olduğu Marka <span class="text-danger">*</span></label>
                <select name="client_id" id="client_id" class="form-select bg-dark text-light border-secondary @error('client_id') is-invalid @enderror" required>
                    <option value="">-- Marka Seçin --</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="title" class="form-label" style="color: rgba(255,255,255,0.7);">Proje Adı <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="slug" class="form-label" style="color: rgba(255,255,255,0.7);">Seo URL (Slug) <span class="text-muted" style="font-size: 0.8rem;">(Boş bırakırsanız isme göre otomatik oluşur)</span></label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 p-4 rounded" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.1);">
                <label class="form-label mb-3 d-block" style="color: rgba(255,255,255,0.7);">Proje Türü Seçimi <span class="text-danger">*</span></label>
                
                <div class="form-check form-check-inline me-4">
                    <input class="form-check-input" type="radio" name="type" id="type_video" value="video" {{ old('type', 'video') == 'video' ? 'checked' : '' }}>
                    <label class="form-check-label text-light" for="type_video" style="cursor: pointer;">
                        <i class="fa-brands fa-youtube text-danger me-1"></i> YouTube Videosu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="type_image" value="image" {{ old('type') == 'image' ? 'checked' : '' }}>
                    <label class="form-check-label text-light" for="type_image" style="cursor: pointer;">
                        <i class="fa-solid fa-image text-info me-1"></i> Sadece Görsel
                    </label>
                </div>
            </div>

            <!-- Video Alanları -->
            <div id="video_fields" class="mb-4" style="display: {{ old('type', 'video') == 'video' ? 'block' : 'none' }};">
                <div class="mb-4">
                    <label for="video_length" class="form-label" style="color: rgba(255,255,255,0.7);">Video Uzunluğu <span class="text-danger">*</span></label>
                    <select name="video_length" id="video_length" class="form-select bg-dark text-light border-secondary @error('video_length') is-invalid @enderror">
                        <option value="short" {{ old('video_length') == 'short' ? 'selected' : '' }}>Kısa Video</option>
                        <option value="long" {{ old('video_length') == 'long' ? 'selected' : '' }}>Uzun Video</option>
                    </select>
                    @error('video_length')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="youtube_url" class="form-label" style="color: rgba(255,255,255,0.7);">YouTube Linki <span class="text-danger">*</span></label>
                    <input type="url" name="youtube_url" id="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" value="{{ old('youtube_url') }}" placeholder="https://www.youtube.com/watch?v=...">
                    @error('youtube_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="thumbnail_image" class="form-label" style="color: rgba(255,255,255,0.7);">Video Kapak Resmi (Thumbnail) <span class="text-danger">*</span></label>
                    <input type="file" name="thumbnail_image" id="thumbnail_image" class="form-control @error('thumbnail_image') is-invalid @enderror" accept="image/*">
                    @error('thumbnail_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="d-block mt-2" style="color: rgba(255,255,255,0.4);">
                        <i class="fa-solid fa-circle-info me-1"></i> Video için özel kapak resmi. Yatay (16:9) oran tavsiye edilir. (Max 10MB)
                    </small>
                </div>
            </div>

            <!-- Image Alanları -->
            <div id="image_fields" class="mb-4" style="display: {{ old('type') == 'image' ? 'block' : 'none' }};">
                <div class="mb-4">
                    <label for="image_path" class="form-label" style="color: rgba(255,255,255,0.7);">Proje Görseli <span class="text-danger">*</span></label>
                    <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror" accept="image/*">
                    @error('image_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="d-block mt-2" style="color: rgba(255,255,255,0.4);">
                        <i class="fa-solid fa-circle-info me-1"></i> Projenin yüksek çözünürlüklü asıl görseli. (Max 10MB)
                    </small>
                </div>
            </div>

            <div class="text-end mt-5">
                <button type="submit" class="btn btn-primary btn-lg px-5">Projeyi Kaydet</button>
            </div>
        </form>
    </div>

    <script>
        // Slug generation
        document.getElementById('title').addEventListener('input', function() {
            let title = this.value;
            let slug = title.toLowerCase()
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

        // Type selection toggle
        const typeRadios = document.querySelectorAll('input[name="type"]');
        const videoFields = document.getElementById('video_fields');
        const imageFields = document.getElementById('image_fields');

        typeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'video') {
                    videoFields.style.display = 'block';
                    imageFields.style.display = 'none';
                } else {
                    videoFields.style.display = 'none';
                    imageFields.style.display = 'block';
                }
            });
        });
    </script>
@endsection
