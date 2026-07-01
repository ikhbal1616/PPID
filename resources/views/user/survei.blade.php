@extends('layouts.frontend')

@section('title', 'Evaluasi Kepuasan Pelayanan | PPID Unbrah')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
        <h1 class="text-3xl sm:text-5xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
            Evaluasi Kepuasan <br class="hidden sm:inline">
            <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Pelayanan PPID</span>
        </h1>
        <p class="text-sm md:text-base text-slate-300/90 max-w-2xl mx-auto font-light leading-relaxed">
            Bantu kami meningkatkan kualitas layanan dengan memberikan penilaian dan umpan balik Anda untuk Tiket {{ $permohonan->ticket_number }}.
        </p>
    </div>
</section>

<!-- SURVEY CONTAINER -->
<section class="py-20 bg-slate-50 text-slate-800 relative overflow-hidden">
    <div class="max-w-xl mx-auto px-4 relative z-10">
        
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl overflow-hidden p-6 md:p-8 space-y-6">
            <!-- Header Info -->
            <div class="text-center pb-6 border-b border-slate-100 space-y-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-brand-green-50 text-brand-green-900 border border-brand-green-100 uppercase tracking-wider">
                    Tiket: {{ $permohonan->ticket_number }}
                </span>
                <h3 class="text-lg font-bold text-slate-900 font-display mt-2">{{ $permohonan->subjek }}</h3>
                <p class="text-[11px] text-slate-400">Diajukan oleh: <span class="font-bold text-slate-500">{{ $permohonan->nama }}</span></p>
            </div>

            <!-- Survey Form -->
            <form id="survey-form" onsubmit="submitSurvey(event)" class="space-y-6">
                @csrf
                <!-- Star Rating -->
                <div class="space-y-3 text-center">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Bagaimana Penilaian Anda Terhadap Layanan Kami?</label>
                    
                    <div class="flex items-center justify-center space-x-2.5 py-4">
                        @for ($i = 1; $i <= 5; $i++)
                        <button type="button" onclick="setRating({{ $i }})" onmouseover="hoverStars({{ $i }})" onmouseout="resetStars()" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-50 hover:bg-amber-50 border border-slate-200 hover:border-amber-200 text-slate-300 hover:text-amber-500 transition-all duration-200 cursor-pointer transform hover:scale-110 active:scale-95 outline-none focus:outline-none" id="star-btn-{{ $i }}">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </button>
                        @endfor
                    </div>
                    
                    <!-- Hidden rating input -->
                    <input type="hidden" name="rating" id="selected-rating" required>
                    <p class="text-xs font-bold text-amber-600 min-h-[1.5rem]" id="rating-desc">&nbsp;</p>
                </div>

                <!-- Written Feedback -->
                <div class="space-y-2">
                    <label for="ulasan_kepuasan" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Ulasan / Kritik & Saran (Opsional)</label>
                    <textarea name="ulasan_kepuasan" id="ulasan_kepuasan" rows="5" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-4 py-3 rounded-2xl transition-all outline-none resize-none" placeholder="Tuliskan masukan atau kritik Anda untuk membantu kami menjadi lebih baik..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="w-full px-6 py-3.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform active:scale-[0.98] flex items-center justify-center space-x-2 text-xs cursor-pointer border-none">
                        <svg class="w-4 h-4 fill-none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                        <span>Kirim Evaluasi Kepuasan</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection

@section('scripts')
<script>
    let currentRating = 0;
    const ratingLabels = {
        1: "Sangat Tidak Puas 😞",
        2: "Tidak Puas 🙁",
        3: "Cukup Puas 😐",
        4: "Puas Simpatik 🙂",
        5: "Sangat Puas! ⭐🤩"
    };

    function setRating(rating) {
        currentRating = rating;
        document.getElementById('selected-rating').value = rating;
        updateStars(rating);
        document.getElementById('rating-desc').innerText = ratingLabels[rating];
    }

    function hoverStars(rating) {
        updateStars(rating);
        document.getElementById('rating-desc').innerText = ratingLabels[rating];
    }

    function resetStars() {
        updateStars(currentRating);
        document.getElementById('rating-desc').innerText = currentRating ? ratingLabels[currentRating] : "\u00A0";
    }

    function updateStars(rating) {
        for (let i = 1; i <= 5; i++) {
            const btn = document.getElementById(`star-btn-${i}`);
            if (i <= rating) {
                btn.classList.remove('bg-slate-50', 'text-slate-300', 'border-slate-200');
                btn.classList.add('bg-amber-50', 'text-amber-500', 'border-amber-200');
            } else {
                btn.classList.remove('bg-amber-50', 'text-amber-500', 'border-amber-200');
                btn.classList.add('bg-slate-50', 'text-slate-300', 'border-slate-200');
            }
        }
    }

    function submitSurvey(event) {
        event.preventDefault();

        if (!currentRating) {
            Swal.fire({
                icon: 'warning',
                title: 'Penilaian Kosong',
                text: 'Harap pilih salah satu rating bintang terlebih dahulu.'
            });
            return;
        }

        // Show Loading
        Swal.fire({
            title: 'Mengirim...',
            text: 'Sedang memproses pengiriman umpan balik Anda.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const ulasan = document.getElementById('ulasan_kepuasan').value.trim();

        fetch(`/evaluasi/{{ str_replace('#', '', $permohonan->ticket_number) }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                rating: currentRating,
                ulasan_kepuasan: ulasan
            })
        })
        .then(res => {
            if (!res.ok) {
                return res.json().then(err => { throw new Error(err.message || 'Gagal mengirim evaluasi.'); });
            }
            return res.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Terima Kasih!',
                    text: data.message,
                    confirmButtonText: 'Kembali ke Beranda',
                    confirmButtonColor: '#003316',
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = '/';
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
                title: 'Terjadi Kesalahan',
                text: err.message || 'Gagal mengirim ulasan kepuasan Anda.'
            });
        });
    }
</script>
@endsection
