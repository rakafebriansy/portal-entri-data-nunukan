<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSp extends Model
{
    protected $fillable = [
        'nama',
        'url',
        'bidang'
    ];

    public function reportSps()
    {
        return $this->hasMany(ReportSp::class);
    }
}
