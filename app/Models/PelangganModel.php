<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $allowedFields = [
        'nama_pelanggan',
        'nama_ortu_pelanggan',
        'usia_pelanggan',
        'no_hp_pelanggan',
        'kota_pelanggan',
        'status_member'
    ];
}