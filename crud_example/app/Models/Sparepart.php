<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $date = ['created_at'];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_sparepart')->withPivot('jumlah')->withTimestamps();
    }
}
