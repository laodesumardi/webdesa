<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'kategori',
        'status',
        'user_id',
    ];

    protected $casts = [
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
     * Scope untuk agenda mendatang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('tanggal_mulai', '>=', now()->toDateString())
            ->where('status', '!=', 'dibatalkan')
            ->orderBy('tanggal_mulai');
    }

    /**
     * Scope untuk agenda bulan ini
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('tanggal_mulai', now()->month)
            ->whereYear('tanggal_mulai', now()->year);
    }

    /**
     * Get formatted date
     */
    public function getTanggalFormatAttribute()
    {
        if ($this->tanggal_selesai && $this->tanggal_mulai != $this->tanggal_selesai) {
            return $this->tanggal_mulai->translatedFormat('d M') . ' - ' . $this->tanggal_selesai->translatedFormat('d M Y');
        }
        return $this->tanggal_mulai->translatedFormat('d F Y');
    }

    /**
     * Get formatted time
     */
    public function getWaktuFormatAttribute()
    {
        if ($this->waktu_mulai) {
            $waktu = Carbon::parse($this->waktu_mulai)->format('H:i');
            if ($this->waktu_selesai) {
                $waktu .= ' - ' . Carbon::parse($this->waktu_selesai)->format('H:i');
            }
            return $waktu . ' WIB';
        }
        return null;
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'akan_datang' => 'Akan Datang',
            'berlangsung' => 'Berlangsung',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan',
            default => $this->status,
        };
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'akan_datang' => 'blue',
            'berlangsung' => 'green',
            'selesai' => 'gray',
            'dibatalkan' => 'red',
            default => 'gray',
        };
    }

    /**
     * Kategori yang tersedia
     */
    public static function getKategori()
    {
        return [
            'kegiatan' => 'Kegiatan Desa',
            'rapat' => 'Rapat',
            'musyawarah' => 'Musyawarah',
            'pelatihan' => 'Pelatihan',
            'sosial' => 'Kegiatan Sosial',
            'keagamaan' => 'Keagamaan',
            'lainnya' => 'Lainnya',
        ];
    }
}
