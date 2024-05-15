<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertumbuhan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftaran_id', 
        'tb', 
        'bb', 
        'lk', 
        'catatan',
        'tglposyandu',
    ];

    public function pendaftaran() {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }
}
