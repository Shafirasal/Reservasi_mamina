<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahTimestamps extends Migration
{
    public function up()
    {
        $this->forge->addColumn('reservasi', [
            'created_at'    => [
                'type'  => 'DATETIME',
                'null'  => true,
                'default'   => null
            ],
            'updated_at'    => [
                'type'  => 'DATETIME',
                'null'  => true,
                'default'   => null
            ]
        ]);
    }

    public function down()
    {
         $this->forge->dropColumn('reservasi', ['created_at', 'updated_at']);
    }
}
