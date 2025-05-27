<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'reservasi_mamina_layanan';
    protected $primaryKey = 'id_layanan';

    protected $allowedFields = [
        'kode_layanan',
        'nama_layanan',
        'deskripsi_layanan'
    ];

    // protected $returnType     = 'array';
    protected $useTimestamps  = true;
}
