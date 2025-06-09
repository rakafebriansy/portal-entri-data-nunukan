<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportPdrb extends Model
{
    protected $fillable = [
        'kategori_pdrb_id',
        'user_id',
        'tahun',
        'deskripsi',
        'url_file',
        'status',
    ];
    public function kategoriPdrb()
    {
        return $this->belongsTo(KategoriPdrb::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
