<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportSp extends Model
{
    protected $fillable = [
        'kategori_sp_id',
        'user_id',
        'tahun',
        'deskripsi',
        'url_file',
        'status',
    ];
    public function kategoriSp()
    {
        return $this->belongsTo(KategoriSp::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
