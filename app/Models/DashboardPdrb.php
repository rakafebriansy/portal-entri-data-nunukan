<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardPdrb extends Model
{
    protected $fillable = [
        'tahun',
        'deskripsi',
    ];

    public function detailDashboardPdrb() 
    {
        return $this->hasOne(DetailDashboardPdrb::class);
    }
}
