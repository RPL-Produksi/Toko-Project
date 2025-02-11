<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Perusahaan extends Model
{
    use HasUuids;

    protected $fillable = [
        'nama',
        'alamat',
        'nomor_telp',
        'email',
        'is_paid',
        'user_id',
        'expired_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($perusahaan) {
            $perusahaan->id = Str::uuid(); // Membuat UUID baru saat perusahaan baru dibuat
        });
    }
}
