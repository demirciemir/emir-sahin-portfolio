@extends('layouts.admin')

@section('title', 'Özgeçmiş (CV) Yönetimi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Özgeçmiş (CV) Yönetimi</h1>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="admin-card">
                <h4 class="mb-4">Yeni CV Yükle</h4>
                <form action="{{ route('admin.cv.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="cv_file" class="form-label" style="color: rgba(255,255,255,0.7);">PDF Dosyası Seçin <span class="text-danger">*</span></label>
                        <input type="file" name="cv_file" id="cv_file" class="form-control @error('cv_file') is-invalid @enderror" accept=".pdf" required>
                        @error('cv_file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="d-block mt-2" style="color: rgba(255,255,255,0.4);">
                            <i class="fa-solid fa-circle-info me-1"></i> Sadece PDF formatı desteklenir. (Max 10MB)
                        </small>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-100">Yükle ve Aktif Et</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="admin-card">
                <h4 class="mb-4">Yüklü Özgeçmişler</h4>
                @if($cvs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Dosya Adı</th>
                                    <th>Durum</th>
                                    <th>Yüklenme Tarihi</th>
                                    <th class="text-end">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cvs as $cv)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="{{ asset($cv->file_path) }}" target="_blank" class="text-light text-decoration-none">
                                                <i class="fa-solid fa-file-pdf text-danger me-2"></i> 
                                                {{ basename($cv->file_path) }}
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            @if($cv->is_active)
                                                <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i> Aktif (Kullanımda)</span>
                                            @else
                                                <span class="badge bg-secondary">Pasif</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-muted">
                                            {{ $cv->created_at->format('d.m.Y H:i') }}
                                        </td>
                                        <td class="align-middle text-end">
                                            <a href="{{ asset($cv->file_path) }}" target="_blank" class="btn btn-sm btn-outline-light me-2" title="Görüntüle"><i class="fa-solid fa-eye"></i></a>
                                            
                                            @if(!$cv->is_active)
                                                <form action="{{ route('admin.cv.makeActive', $cv->id) }}" method="POST" class="d-inline-block me-2">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success" title="Aktif Et"><i class="fa-solid fa-check"></i></button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.cv.destroy', $cv->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bu özgeçmişi silmek istediğinize emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Sil"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fa-solid fa-file-pdf fa-3x mb-3" style="color: rgba(255,255,255,0.2);"></i>
                        <p class="mb-0 text-muted">Henüz sisteme yüklenmiş bir CV bulunmuyor.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
