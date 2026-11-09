{{-- Partial View: Form Input User (Digunakan reusable untuk Create dan Edit) --}}
@php
    $isEdit = isset($user);
@endphp

<div class="row">
    <!-- Input Nama Lengkap (dengan repopulate old) -->
    <div class="col-12 mb-3">
        <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </span>
            <input type="text" 
                   id="name" 
                   name="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   placeholder="Masukkan nama lengkap user"
                   value="{{ old('name', $user->name ?? '') }}" 
                   required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Input Email (dengan repopulate old) -->
    <div class="col-12 mb-3">
        <label for="email" class="form-label fw-bold">Alamat Email <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </span>
            <input type="email" 
                   id="email" 
                   name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   placeholder="contoh: user@example.com"
                   value="{{ old('email', $user->email ?? '') }}" 
                   required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Input Password -->
    <div class="col-md-6 mb-3">
        <label for="password" class="form-label fw-bold">
            Password 
            @if(!$isEdit)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </span>
            <input type="password" 
                   id="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Minimal 6 karakter"
                   {{ $isEdit ? '' : 'required' }}>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @if($isEdit)
            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti password.</small>
        @endif
    </div>

    <!-- Input Konfirmasi Password -->
    <div class="col-md-6 mb-3">
        <label for="password_confirmation" class="form-label fw-bold">
            Konfirmasi Password 
            @if(!$isEdit)
                <span class="text-danger">*</span>
            @endif
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </span>
            <input type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   class="form-control" 
                   placeholder="Ulangi password"
                   {{ $isEdit ? '' : 'required' }}>
        </div>
    </div>
</div>

<!-- Action Buttons -->
<div class="mt-4 pt-2 d-flex align-items-center">
    <button type="submit" class="btn btn-primary me-2 text-white">
        <svg class="icon icon-xs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        {{ $isEdit ? 'Perbarui Data User' : 'Simpan User' }}
    </button>
    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
        Batal
    </a>
</div>
