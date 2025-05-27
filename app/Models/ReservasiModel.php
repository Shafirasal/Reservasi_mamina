<?php

namespace App\Models;

use CodeIgniter\Model;

<<<<<<< HEAD
    class ReservasiModel extends Model
{
    protected $table      = 'reservasi';
=======
class ReservasiModel extends Model
{
    protected $table      = 'reservasi_mamina_reservasi';
>>>>>>> 718408d7fc3f507ac174c0c771a367fe95543591
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

<<<<<<< HEAD
    protected $useTimestamps = false;
}

=======
    // protected $returnType     = 'array';
    protected $useTimestamps  = true;
}
>>>>>>> 718408d7fc3f507ac174c0c771a367fe95543591
