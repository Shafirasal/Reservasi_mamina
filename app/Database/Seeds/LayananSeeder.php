<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run()
    {
        $layanan = [
            "Pijat Kid",
            "Pijat Kakak Adik",
            "Pijat & Scrub",
            "Pijat Terapi Kid",
            "Pijat Toddler",
            "Pijat Terapi",
            "Pijat Tuina",
            "Pijat + Gym Ball",
            "Toddler Swim"
        ];

        foreach ($layanan as $index => $nama) {
            $this->db->table('layanan')->insert([
                'kode_layanan'       => 'LYN' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_layanan'       => $nama,
                'deskripsi_layanan'  => 'Deskripsi untuk ' . $nama
            ]);
        }
    }
}
