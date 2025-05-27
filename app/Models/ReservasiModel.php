<?php

namespace App\Models;

use CodeIgniter\Model;

    class ReservasiModel extends Model
{
    protected $table      = 'reservasi';
    protected $primaryKey = 'id_reservasi';

    protected $allowedFields = [
        'tanggal_reservasi',
        'jenis_layanan',
        'tau_mamina_dari',
        'jam_reservasi',
        'status',
        'id_pelanggan',
        'id_layanan',
        'id_ulasan'
    ];

    protected $useTimestamps = false;
}

