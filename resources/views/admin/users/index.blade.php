@extends('layouts.admin')

@section('title', 'Yetkililer')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Yetkililer (Users)</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i> Yeni Yetkili Ekle</a>
    </div>

    <div class="admin-card">
        @if($users->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th>İsim (Name)</th>
                            <th>Kullanıcı Adı (Username)</th>
                            <th>Oluşturulma Tarihi</th>
                            <th class="text-end">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="align-middle fw-bold">
                                    <i class="fa-solid fa-user-tie text-muted me-2"></i> {{ $user->name }}
                                    @if(auth()->id() === $user->id)
                                        <span class="badge bg-success ms-2">Siz</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $user->username }}</td>
                                <td class="align-middle text-muted">{{ $user->created_at->format('d.m.Y H:i') }}</td>
                                <td class="align-middle text-end">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-light me-2"><i class="fa-solid fa-pen"></i></a>
                                    
                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bu yetkiliyi tamamen silmek istediğinize emin misiniz?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-sm btn-outline-secondary" disabled title="Kendinizi silemezsiniz"><i class="fa-solid fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <p class="mb-0 text-muted">Henüz hiç yetkili eklenmemiş.</p>
            </div>
        @endif
    </div>
@endsection
