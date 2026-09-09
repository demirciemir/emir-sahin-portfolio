@extends('layouts.admin')

@section('title', 'İletişim Bilgileri')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>İletişim Bilgileri Yönetimi</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card" style="max-width: 800px;">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="contact_name" class="form-label" style="color: rgba(255,255,255,0.7);">İsim / Unvan <span class="text-danger">*</span></label>
                <input type="text" name="contact_name" id="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name', $settings['contact_name'] ?? '') }}" required>
                @error('contact_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_email" class="form-label" style="color: rgba(255,255,255,0.7);">E-posta Adresi <span class="text-danger">*</span></label>
                <input type="email" name="contact_email" id="contact_email" class="form-control @error('contact_email') is-invalid @enderror" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
                @error('contact_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact_phone" class="form-label" style="color: rgba(255,255,255,0.7);">Telefon Numarası <span class="text-danger">*</span></label>
                <input type="text" name="contact_phone" id="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
                @error('contact_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="contact_address" class="form-label" style="color: rgba(255,255,255,0.7);">Açık Adres <span class="text-danger">*</span></label>
                <textarea name="contact_address" id="contact_address" class="form-control @error('contact_address') is-invalid @enderror" rows="3" required>{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                @error('contact_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg px-5"><i class="fa-solid fa-save"></i> Değişiklikleri Kaydet</button>
            </div>
        </form>
    </div>
@endsection
