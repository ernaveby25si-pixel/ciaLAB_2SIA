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
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Detail Akun User</h1>
                <p class="mb-0">Informasi lengkap pengguna sistem.</p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-outline-primary d-inline-flex align-items-center">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="avatar-lg bg-primary rounded-circle text-white d-flex align-items-center justify-content-center me-3 fs-3 fw-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="h5 mb-1">{{ $user->name }}</h3>
                            <span class="badge bg-success">Pengguna Aktif</span>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">User ID</span>
                            <span class="fw-bold">#{{ $user->id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Email</span>
                            <span class="fw-bold">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Waktu Pendaftaran</span>
                            <span class="fw-bold">{{ $user->created_at ? $user->created_at->format('d F Y, H:i:s') : '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Pembaruan Terakhir</span>
                            <span class="fw-bold">{{ $user->updated_at ? $user->updated_at->format('d F Y, H:i:s') : '-' }}</span>
                        </li>
                    </ul>

                    <div class="mt-4 pt-2 d-flex">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning me-2 text-white">
                            <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit User
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
