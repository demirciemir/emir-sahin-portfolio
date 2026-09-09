@extends('layouts.admin')

@section('title', 'Markalar')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Markalar (Clients)</h1>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i> Yeni Marka Ekle</a>
    </div>

    <div class="admin-card">
        @if($clients->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;"></th>
                            <th>Logo</th>
                            <th>Marka Adı</th>
                            <th>Kategori (Title)</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="sortable-list">
                        @foreach($clients as $client)
                            <tr data-id="{{ $client->id }}">
                                <td class="align-middle text-center">
                                    <i class="fa-solid fa-grip-vertical drag-handle" style="cursor: grab; font-size: 1.2rem; color: rgba(255,255,255,0.4);"></i>
                                </td>
                                <td class="align-middle">
                                    @if($client->logo_image)
                                        <img src="{{ asset($client->logo_image) }}" alt="{{ $client->name }}" style="height: 40px; border-radius: 8px;">
                                    @else
                                        <span class="text-muted">Logo Yok</span>
                                    @endif
                                </td>
                                <td class="align-middle fw-bold">{{ $client->name }}</td>
                                <td class="align-middle">{{ $client->title }}</td>
                                <td class="align-middle text-end">
                                    <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-sm btn-outline-light me-2"><i class="fa-solid fa-pen"></i></a>
                                    
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bu markayı silmek istediğinize emin misiniz? (İçindeki projeler de silinir!)');">
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
            <p class="mt-3 mb-0" style="font-size: 0.9rem; color: rgba(255,255,255,0.5);"><i class="fa-solid fa-info-circle me-1"></i> Markaların ana sayfadaki sırasını değiştirmek için sol taraftaki tutamaçlardan sürükleyip bırakabilirsiniz.</p>
        @else
            <div class="text-center py-5">
                <i class="fa-solid fa-briefcase fa-3x mb-3" style="color: rgba(255,255,255,0.2);"></i>
                <p class="mb-0 text-muted">Henüz hiç marka eklenmemiş.</p>
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

                        fetch("{{ route('admin.clients.reorder') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order: order })
                        }).then(response => response.json())
                          .then(data => {
                              if(data.success) {
                                  // Optional: Show a small toast or notification
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
