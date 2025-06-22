<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdTerapisToreservasi extends Migration
{
    public function up()
    {
        $this->forge->addColumn('reservasi', [
            'id_terapis' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id_layanan', // letak kolomnya
            ],
        ]);

        $this->db->query('ALTER TABLE `reservasi` ADD CONSTRAINT `fk_terapis_reservasi` FOREIGN KEY (`id_terapis`) REFERENCES `terapis`(`id_terapis`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `reservasi` DROP FOREIGN KEY `fk_terapis_reservasi`');
        $this->forge->dropColumn('reservasi', 'id_terapis');
    }
}
