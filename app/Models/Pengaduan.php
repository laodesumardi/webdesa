<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'telepon',
        'alamat',
        'kategori',
        'judul',
        'isi',
        'lampiran',
        'status',
        'tanggapan',
        'user_id',
        'ditanggapi_at',
    ];

    protected $casts = [
        'ditanggapi_at' => 'datetime',
    ];

    /**
     * Relasi ke User (admin yang menanggapi)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'masuk' => 'Masuk',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => $this->status,
        };
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'masuk' => 'yellow',
            'diproses' => 'blue',
            'selesai' => 'green',
            'ditolak' => 'red',
            default => 'gray',
        };
    }

    /**
     * Kategori yang tersedia
     */
    public static function getKategori()
    {
        return [
            'umum' => 'Umum',
            'infrastruktur' => 'Infrastruktur',
            'pelayanan' => 'Pelayanan Publik',
            'sosial' => 'Sosial',
            'keamanan' => 'Keamanan',
            'lingkungan' => 'Lingkungan',
            'lainnya' => 'Lainnya',
        ];
    }
}
