<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintModel extends Model
{
    use HasFactory;

    protected $table = 'print';

    protected $fillable = [
        'user_id',
        'file_path',
        'no_telpon',
        'alamat_lengkap',
        'jilid',
        'gratis_ongkir',
        'jumlah_halaman',
        'total_biaya',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
