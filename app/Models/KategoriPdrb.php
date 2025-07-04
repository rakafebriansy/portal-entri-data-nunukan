<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriPdrb extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function reportPdrbs()
    {
        return $this->hasMany(ReportPdrb::class);
    }

}
