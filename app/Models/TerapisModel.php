<?php

namespace App\Models;
use CodeIgniter\Model;

class TerapisModel extends Model
{
    protected $table = 'terapis';
    protected $primaryKey = 'id_terapis';
    protected $allowedFields = ['nama_terapis'];
}
