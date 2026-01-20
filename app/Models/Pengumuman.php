<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'kategori',
        'is_penting',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'user_id',
    ];

    protected $casts = [
        'is_penting' => 'boolean',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk pengumuman aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('tanggal_mulai')
                    ->orWhere('tanggal_mulai', '<=', now()->toDateString());
            })
            ->where(function ($q) {
                $q->whereNull('tanggal_selesai')
                    ->orWhere('tanggal_selesai', '>=', now()->toDateString());
            });
    }

    /**
     * Scope untuk pengumuman penting
     */
    public function scopePenting($query)
    {
        return $query->where('is_penting', true);
    }

    /**
     * Kategori yang tersedia
     */
    public static function getKategori()
    {
        return [
            'umum' => 'Umum',
            'pelayanan' => 'Pelayanan',
            'keuangan' => 'Keuangan',
            'kesehatan' => 'Kesehatan',
            'pendidikan' => 'Pendidikan',
            'sosial' => 'Sosial',
            'lainnya' => 'Lainnya',
        ];
    }
}
