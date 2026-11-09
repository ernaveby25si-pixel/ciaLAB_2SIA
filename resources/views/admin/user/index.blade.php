@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Manajemen Data User</h1>
                <p class="mb-0">Daftar seluruh pengguna sistem yang terdaftar.</p>
            </div>
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-primary text-white d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah User
                </a>
            </div>
        </div>
    </div>

    {{-- Partial View: Alerts Notifikasi (Success / Error) --}}
    @include('admin.user.partials._alerts')

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-hover table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">No</th>
                                    <th class="border-0">Nama Lengkap</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Terdaftar Pada</th>
                                    <th class="border-0 rounded-end text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $index => $item)
                                    <tr>
                                        <td>
                                            @if(method_exists($users, 'firstItem'))
                                                {{ $users->firstItem() + $index }}
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-primary rounded-circle text-white d-flex align-items-center justify-content-center me-3 fw-bold">
                                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                                </div>
                                                <div class="fw-bold">{{ $item->name }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <!-- Detail -->
                                                <a href="{{ route('user.show', $item->id) }}" class="btn btn-outline-info btn-sm" title="Detail">
                                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Detail
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                                    <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Edit
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('user.destroy', $item->id) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $item->name }}?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-end" title="Hapus">
                                                        <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            <em>Belum ada data user yang terdaftar.</em>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(method_exists($users, 'hasPages') && $users->hasPages())
                        <div class="mt-4 d-flex justify-content-end">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
