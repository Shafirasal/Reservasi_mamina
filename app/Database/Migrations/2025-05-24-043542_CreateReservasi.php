<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReservasi extends Migration
{
     public function up()
    {
        $this->forge->addField([
            'id_reservasi'    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
                'tanggal_reservasi'    => [
                'type'              => 'DATE',
                'null'              => false,
            ],
            'nama_bunda'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '40',
                'null'              => false
            ],
            'nama_anak'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '40',
                'null'              => false
            ],
            'usia_anak' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => true
            ],
                'nomor_telepon'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '15',
                'null'              => false
            ],
                'kota'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '15',
                'null'              => false
            ],
                'member'  => [
                'type'              => "ENUM('Member', 'Non Member')",
                'null'               => false
            ],
                'jenis_layanan'  => [
                'type'              => "ENUM('Home Care', 'Outlet')",
                'null'               => false
            ],
                'tau_mamina_dari'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => false
            ],
                'jam_reservasi' => [
                'type'              => 'TIME',
                'null'              => false
            ],

            ]);
        $this->forge->addKey('id_reservasi', true);
        $this->forge->createTable('reservasi');
    }

    public function down()
    {
         $this->forge->dropTable('reservasi');
    }
}
