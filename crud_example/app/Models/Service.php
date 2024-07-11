<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategori');
    }

    public function mekanik()
    {
        return $this->belongsTo(Mekanik::class, 'idmekanik');
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'service_sparepart')->withPivot('jumlah')->withTimestamps();
    }
}
