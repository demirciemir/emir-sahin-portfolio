@extends('layouts.admin')

@section('title', 'Sosyal Medya Yönetimi')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Sosyal Medya Yönetimi</h1>
        <a href="{{ route('admin.social-media.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i> Yeni Ekle</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        @if($platforms->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;"></th>
                            <th scope="col">İkon</th>
                            <th scope="col">Platform Adı</th>
                            <th scope="col">URL</th>
                            <th scope="col">Durum</th>
                            <th scope="col" class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-list">
                        @foreach($platforms as $platform)
                            <tr data-id="{{ $platform->id }}">
                                <td class="align-middle text-center">
                                    <i class="fa-solid fa-grip-vertical drag-handle" style="cursor: grab; font-size: 1.2rem; color: rgba(255,255,255,0.4);"></i>
                                </td>
                                <td><i class="{{ $platform->icon_class }} fs-4"></i></td>
                                <td>{{ $platform->name }}</td>
                                <td>
                                    @if($platform->url)
                                        <a href="{{ $platform->url }}" target="_blank">{{ Str::limit($platform->url, 30) }}</a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.social-media.toggle', $platform) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $platform->is_active ? 'btn-success' : 'btn-secondary' }}">
                                            {{ $platform->is_active ? 'Aktif' : 'Pasif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.social-media.edit', $platform) }}" class="btn btn-sm btn-outline-light me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.social-media.destroy', $platform) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu hesabı silmek istediğinize emin misiniz?');">
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
        @else
            <div class="text-center py-5">
                <p class="mb-0 text-muted">Kayıtlı sosyal medya hesabı bulunamadı.</p>
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

                        fetch("{{ route('admin.social-media.reorder') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order: order })
                        }).then(response => response.json())
                          .then(data => {
                              if(data.success) {
                                  console.log('Sıralama güncellendi!');
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
