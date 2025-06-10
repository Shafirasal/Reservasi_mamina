<?php

namespace App\Models;

use CodeIgniter\Model;

class UlasanModel extends Model
{
    protected $table      = 'ulasan';
    protected $primaryKey = 'id_ulasan';

    protected $allowedFields = [
        'id_pelanggan',
        'id_layanan',
        'id_reservasi',
        'kualitas_layanan',
        'kenyamanan_fasilitas',
        'kesesuaian_harga',
        'keinginan_layanan_tambahan',
        'ingin_dihubungi_promo',
        'created_at'
    ];

    protected $returnType     = 'array';
    protected $useTimestamps  = false;
}
