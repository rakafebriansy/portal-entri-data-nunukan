<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardSp extends Model
{
    protected $fillable = [
        'tahun',
        'deskripsi',
    ];

    public function detailDashboardSp()
    {
        return $this->hasOne(DetailDashboardSp::class);
    }
}
