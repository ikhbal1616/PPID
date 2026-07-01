@extends('layouts.admin')

@section('title', 'Kelola User / Operator')

@section('header-left')
<h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Pengaturan Sistem</h2>
@endsection

@section('content')
<!-- HEADER SUMMARY -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola User / Operator</h1>
        <p class="text-slate-500 text-xs mt-1">Daftar pengguna admin, petugas, dan pimpinan yang terdaftar dalam sistem PPID.</p>
    </div>
    
    <button onclick="openUserModal(-1)" class="px-4 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-2 shadow-md">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
        <span>Tambah User Baru</span>
    </button>
</div>

<!-- USER LIST CARD TABLE -->
<div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden mt-6">
    <div class="overflow-x-auto w-full">
        <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
            <thead class="bg-slate-50 font-bold uppercase text-[10px] tracking-wider text-slate-500">
                <tr>
                    <th scope="col" class="px-6 py-4 w-[5%]">No</th>
                    <th scope="col" class="px-6 py-4 w-[30%]">Nama Lengkap</th>
                    <th scope="col" class="px-6 py-4 w-[35%]">Alamat Email</th>
                    <th scope="col" class="px-6 py-4 w-[15%]">Peran (Role)</th>
                    <th scope="col" class="px-6 py-4 w-[15%] text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @foreach ($users as $index => $u)
                <tr class="hover:bg-slate-50/50 transition-colors font-medium">
                    <td class="px-6 py-4 font-mono text-slate-400">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-brand-green-50 text-brand-green-900 flex items-center justify-center font-bold text-xs uppercase">
                                {{ strtoupper(substr($u->name, 0, 2)) }}
                            </div>
                            <span class="font-bold text-slate-800">{{ $u->name }}</span>
                            @if ($u->id === $adminUser->id)
                            <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 text-[9px] px-2 py-0.5 rounded-md font-bold">Anda</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-slate-500">{{ $u->email }}</td>
                    <td class="px-6 py-4">
                        @if ($u->role === 'admin')
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-100 uppercase tracking-wider">Super Admin</span>
                        @elseif ($u->role === 'petugas')
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-bold bg-blue-50 text-blue-700 border border-blue-100 uppercase tracking-wider">Petugas PPID</span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-bold bg-slate-100 text-slate-700 border border-slate-200 uppercase tracking-wider">Pimpinan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right space-x-1.5 whitespace-nowrap">
                        <button onclick="openUserModal({{ $index }})" class="px-3 py-1.5 bg-slate-50 text-slate-600 hover:bg-brand-green-50 hover:text-brand-green-900 border border-slate-200 hover:border-brand-green-900/20 rounded-lg font-bold text-[10px] transition-all cursor-pointer">Edit</button>
                        @if ($u->id !== $adminUser->id)
                        <button onclick="deleteUser({{ $u->id }}, '{{ $u->name }}')" class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white border border-rose-100 hover:border-transparent rounded-lg font-bold text-[10px] transition-all cursor-pointer">Hapus</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- USER CRUD FORM POP-UP MODAL -->
<div id="user-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto hidden" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="user-modal-backdrop" onclick="closeUserModal()"></div>

    <!-- Modal Content -->
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl flex flex-col justify-between transform scale-95 opacity-0 transition-all duration-300 ease-out border border-slate-100 overflow-hidden" id="user-modal-container">
        <!-- Header -->
        <div class="bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-5 flex justify-between items-center text-white">
            <div>
                <h3 class="text-sm font-bold font-display" id="modal-title">Tambah User Baru</h3>
                <p class="text-[9px] text-brand-gold-500 tracking-wider uppercase font-semibold mt-0.5" id="modal-subtitle">Operator PPID</p>
            </div>
            <button onclick="closeUserModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer border-none outline-none focus:outline-none">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Form Body -->
        <form id="user-form" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4 text-xs text-slate-700">
            <input type="hidden" id="form-user-id">

            <div class="space-y-1.5">
                <label for="form-name" class="block font-bold text-slate-600 uppercase tracking-wider text-[10px]">Nama Lengkap</label>
                <input type="text" id="form-name" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none" required placeholder="Masukkan nama lengkap...">
            </div>

            <div class="space-y-1.5">
                <label for="form-email" class="block font-bold text-slate-600 uppercase tracking-wider text-[10px]">Alamat Email</label>
                <input type="email" id="form-email" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none" required placeholder="name@unbrah.ac.id">
            </div>

            <div class="space-y-1.5">
                <label for="form-role" class="block font-bold text-slate-600 uppercase tracking-wider text-[10px]">Peran Akses (Role)</label>
                <select id="form-role" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none cursor-pointer" required>
                    <option value="" disabled selected>Pilih hak akses...</option>
                    <option value="admin">Super Admin (Akses Penuh)</option>
                    <option value="petugas">Petugas PPID (Kelola Konten & Tiket)</option>
                    <option value="pimpinan">Pimpinan (Tinjau Laporan Saja)</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label for="form-password" class="block font-bold text-slate-600 uppercase tracking-wider text-[10px]" id="label-password">Kata Sandi (Password)</label>
                <input type="password" id="form-password" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none" placeholder="Minimal 8 karakter...">
                <p id="password-hint" class="text-[9px] text-slate-400 mt-1 hidden">*Biarkan kosong jika tidak ingin mengubah kata sandi.</p>
            </div>

            <!-- Modal Footer Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-3">
                <button type="button" onclick="closeUserModal()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-500 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">Batal</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-green-900 hover:bg-brand-green-900 text-white text-xs font-bold shadow-lg transition-all duration-300 cursor-pointer">Simpan User</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Global User Array from Laravel
    const users = @json($users);
    let activeEditIndex = -1;

    // Open Modal
    function openUserModal(index) {
        const modal = document.getElementById('user-modal');
        const backdrop = document.getElementById('user-modal-backdrop');
        const container = document.getElementById('user-modal-container');
        const form = document.getElementById('user-form');
        
        // Reset form validation errors
        form.reset();
        activeEditIndex = index;

        if (index === -1) {
            // ADD MODE
            document.getElementById('modal-title').innerText = "Tambah User Baru";
            document.getElementById('form-user-id').value = "";
            document.getElementById('form-password').required = true;
            document.getElementById('password-hint').classList.add('hidden');
        } else {
            // EDIT MODE
            const user = users[index];
            document.getElementById('modal-title').innerText = `Edit Data: ${user.name}`;
            document.getElementById('form-user-id').value = user.id;
            document.getElementById('form-name').value = user.name;
            document.getElementById('form-email').value = user.email;
            document.getElementById('form-role').value = user.role;
            document.getElementById('form-password').required = false;
            document.getElementById('password-hint').classList.remove('hidden');
        }

        // Trigger animations
        modal.classList.remove('hidden');
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            container.classList.remove('scale-95', 'opacity-0');
            container.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    // Close Modal
    function closeUserModal() {
        const modal = document.getElementById('user-modal');
        const backdrop = document.getElementById('user-modal-backdrop');
        const container = document.getElementById('user-modal-container');

        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        container.classList.remove('scale-100', 'opacity-100');
        container.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Handle Add/Edit Submit via AJAX
    function handleFormSubmit(event) {
        event.preventDefault();

        const userId = document.getElementById('form-user-id').value;
        const nameVal = document.getElementById('form-name').value.trim();
        const emailVal = document.getElementById('form-email').value.trim();
        const roleVal = document.getElementById('form-role').value;
        const passwordVal = document.getElementById('form-password').value;

        // Validation for password length
        if (passwordVal && passwordVal.length < 8) {
            Swal.fire({
                icon: 'warning',
                title: 'Password Lemah',
                text: 'Kata sandi minimal harus terdiri dari 8 karakter.'
            });
            return;
        }

        // Show loading screen
        Swal.fire({
            title: 'Menyimpan...',
            text: 'Sedang memproses penyimpanan data user.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Determine request details
        const url = userId ? `/admin/users/${userId}/update` : '/admin/users';
        const payload = {
            name: nameVal,
            email: emailVal,
            role: roleVal,
        };
        if (passwordVal) {
            payload.password = passwordVal;
        }

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(res => {
            if (!res.ok) {
                return res.json().then(err => { throw new Error(err.message || 'Terjadi kesalahan sistem.'); });
            }
            return res.json();
        })
        .then(data => {
            if (data.success) {
                closeUserModal();
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: data.message,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload(); // Refresh table view to reflect DB changes
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: data.message
                });
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menyimpan',
                text: err.message || 'Terjadi kesalahan saat memproses data. Email mungkin sudah terdaftar.'
            });
        });
    }

    // Handle Delete Action via AJAX
    function deleteUser(id, name) {
        Swal.fire({
            title: 'Hapus User?',
            text: `Apakah Anda yakin ingin menghapus akun ${name}? Tindakan ini tidak dapat dibatalkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Menghapus...',
                    text: 'Sedang memproses penghapusan user.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Fetch DELETE request
                fetch(`/admin/users/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(res => {
                    if (!res.ok) {
                        return res.json().then(err => { throw new Error(err.message || 'Gagal menghapus user.'); });
                    }
                    return res.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: data.message,
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message
                        });
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Eror Penghapusan',
                        text: err.message
                    });
                });
            }
        });
    }
</script>
@endsection
