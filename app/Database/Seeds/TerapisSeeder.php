<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TerapisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_terapis' => 'Alina Rosa Riadi, Amd. Keb'],
            ['nama_terapis' => 'Aqilah Salma Yuniar, S.Keb., Bd.'],
            ['nama_terapis' => 'Bdn. Gadis Filosofi Melinia, S.Keb'],
            ['nama_terapis' => 'Bdn. Sofy Kartika Putri, S.Keb'],
            ['nama_terapis' => "Hijjayanti Halimatussa'diyah, S.Keb"],
            ['nama_terapis' => 'Intania Putri Wulandari, S.Tr.Keb'],
            ['nama_terapis' => 'Mawa Syifa Warahmah, S.Keb'],
            ['nama_terapis' => 'Rizki Amalia M., S.Tr.Keb'],
            ['nama_terapis' => 'Yolanda Eldamayanti, S.Keb'],
        ];

        // Insert batch ke tabel terapis
        $this->db->table('terapis')->insertBatch($data);
    }
}
