<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'ortu',
        'alamat',
        'no_telp',
        'lahir',
    ];

    // method pertumbuhan
    public function pertumbuhan() {
        return $this->hasMany(Pertumbuhan::class);
    }
}
