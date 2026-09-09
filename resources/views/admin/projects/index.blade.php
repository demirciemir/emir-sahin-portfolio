@extends('layouts.admin')

@section('title', 'Projeler')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Projeler (Projects)</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i> Yeni Proje Ekle</a>
    </div>

    <!-- Filtreleme Alanı -->
    <div class="admin-card mb-4 py-3">
        <form action="{{ route('admin.projects.index') }}" method="GET" class="d-flex align-items-center">
            <label for="client_id" class="me-2 fw-bold" style="color: rgba(255,255,255,0.7);">Marka:</label>
            <select name="client_id" id="client_id" class="form-select bg-dark text-light border-secondary w-auto me-3" onchange="this.form.submit()">
                <option value="">-- Hepsi --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>

            <label for="video_length" class="me-2 fw-bold" style="color: rgba(255,255,255,0.7);">Uzunluk:</label>
            <select name="video_length" id="video_length" class="form-select bg-dark text-light border-secondary w-auto me-3" onchange="this.form.submit()">
                <option value="">-- Hepsi --</option>
                <option value="short" {{ request('video_length') == 'short' ? 'selected' : '' }}>Kısa Video</option>
                <option value="long" {{ request('video_length') == 'long' ? 'selected' : '' }}>Uzun Video</option>
            </select>

            @if(request('client_id') || request('video_length'))
                <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-danger btn-sm">Temizle</a>
            @endif
        </form>
    </div>

    <div class="admin-card">
        @if($projects->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            @if(request('client_id'))
                                <th style="width: 50px;"></th>
                            @endif
                            <th>Kapak / Görsel</th>
                            <th>Proje Adı</th>
                            <th>Ait Olduğu Marka</th>
                            <th>Tür</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="{{ request('client_id') ? 'sortable-list' : '' }}">
                        @foreach($projects as $project)
                            <tr data-id="{{ $project->id }}">
                                @if(request('client_id'))
                                    <td class="align-middle text-center">
                                        <i class="fa-solid fa-grip-vertical drag-handle" style="cursor: grab; font-size: 1.2rem; color: rgba(255,255,255,0.4);"></i>
                                    </td>
                                @endif
                                <td class="align-middle">
                                    @if($project->type == 'video' && $project->thumbnail_image)
                                        <img src="{{ asset($project->thumbnail_image) }}" alt="{{ $project->title }}" style="height: 40px; border-radius: 8px; object-fit: cover; width: 70px;">
                                    @elseif($project->type == 'image' && $project->image_path)
                                        <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" style="height: 40px; border-radius: 8px; object-fit: cover; width: 70px;">
                                    @else
                                        <span class="text-muted"><i class="fa-solid fa-image"></i></span>
                                    @endif
                                </td>
                                <td class="align-middle fw-bold">{{ $project->title }}</td>
                                <td class="align-middle">
                                    <span class="badge bg-secondary">{{ $project->client->name ?? 'Bilinmiyor' }}</span>
                                </td>
                                <td class="align-middle">
                                    @if($project->type == 'video')
                                        <span class="badge bg-danger"><i class="fa-brands fa-youtube me-1"></i> {{ $project->video_length == 'long' ? 'Uzun Video' : 'Kısa Video' }}</span>
                                    @else
                                        <span class="badge bg-info text-dark"><i class="fa-solid fa-image me-1"></i> Görsel</span>
                                    @endif
                                </td>
                                <td class="align-middle text-end">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-light me-2"><i class="fa-solid fa-pen"></i></a>
                                    
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bu projeyi silmek istediğinize emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if(request('client_id'))
                <p class="mt-3 mb-0" style="font-size: 0.9rem; color: rgba(255,255,255,0.5);">
                    <i class="fa-solid fa-info-circle me-1"></i> Bu markaya ait projelerin sırasını değiştirmek için sol taraftaki tutamaçlardan sürükleyip bırakabilirsiniz.
                </p>
            @else
                <p class="mt-3 mb-0" style="font-size: 0.9rem; color: rgba(255,255,255,0.4);">
                    <i class="fa-solid fa-info-circle me-1"></i> Sıralama (Sürükle-Bırak) işlemi yapabilmek için yukarıdan <strong>belirli bir marka seçmelisiniz</strong>.
                </p>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fa-solid fa-video-slash fa-3x mb-3" style="color: rgba(255,255,255,0.2);"></i>
                <p class="mb-0 text-muted">Bu kritere uygun proje bulunamadı.</p>
            </div>
        @endif
    </div>

    <!-- SortableJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var el = document.getElementById('sortable-list');
            if (el) {
                var sortable = Sortable.create(el, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'bg-dark',
                    onEnd: function (evt) {
                        var order = [];
                        el.querySelectorAll('tr').forEach(function (row) {
                            order.push(row.getAttribute('data-id'));
                        });

                        fetch("{{ route('admin.projects.reorder') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order: order })
                        }).then(response => response.json())
                          .then(data => {
                              if(data.success) {
                                  console.log('Proje sıralaması güncellendi!');
                              }
                          }).catch(error => {
                              console.error('Sıralama hatası:', error);
                          });
                    }
                });
            }
        });
    </script>
@endsection
