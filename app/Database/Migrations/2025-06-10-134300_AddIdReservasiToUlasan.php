<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdReservasiToUlasan extends Migration
{
    public function up()
    {
        $this->forge->addColumn('ulasan', [
            'id_reservasi' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id_layanan', // letak kolomnya
            ],
        ]);

        $this->db->query('ALTER TABLE `ulasan` ADD CONSTRAINT `fk_ulasan_reservasi` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi`(`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `ulasan` DROP FOREIGN KEY `fk_ulasan_reservasi`');
        $this->forge->dropColumn('ulasan', 'id_reservasi');
    }
}
