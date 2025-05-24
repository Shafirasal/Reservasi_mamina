<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToReservasi extends Migration
{
    public function up()
    {
        $this->forge->addColumn('reservasi', [
            'status' => [
                'type'       => "ENUM('Menunggu', 'Selesai', 'Batal')",
                'null'       => false,
                'default'    => 'Menunggu',
                'after'      => 'jam_reservasi' 
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('reservasi', 'status');
    }
}
