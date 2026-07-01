<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ticket_number',
        'nama',
        'email',
        'nik',
        'telepon',
        'alamat',
        'kategori',
        'subjek',
        'perincian',
        'bentuk_informasi',
        'cara_mendapatkan',
        'file_bukti',
        'status',
        'tanggapan',
        'file_tanggapan',
        'rating',
        'ulasan_kepuasan',
    ];
}
