<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Pelanggan1Seeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_pelanggan' => 'Kenan',
                'nama_ortu_pelanggan' => '',
                'usia_pelanggan' => '4 bulan',
                'no_hp_pelanggan' => '082244136757',
                'kota_pelanggan' => 'Malang',
                'status_member' => 1
            ]
        ];

        $this->db->table('pelanggan')->insertBatch($data);
    }
}
