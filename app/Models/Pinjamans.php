<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjamans extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function PenganjuanPinjamans()
    {
        return $this->belongsTo(PenganjuanPinjamans::class, 'pengajuan_id', 'id');
    }

    public function cicilan()
    {
        return $this->hasMany(Cicilan::class, 'pinjaman_id', 'id');
    }
}
