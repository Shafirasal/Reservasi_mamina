<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreateReservasiTable extends Migration
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
                'status' => [
                    'type'       => "ENUM('Menunggu', 'Selesai', 'Batal')",
                    'null'       => false,
                    'default'    => 'Menunggu',
                    'after'      => 'jam_reservasi' 
            ],
                'id_pelanggan' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
                    'null'       => false
            ],
                'id_layanan' => [
                    'type'       => 'TEXT',
                    'null'       => false,
                    'constraint'    => 30
            ],
            ]);
        $this->forge->addKey('id_reservasi', true);
        $this->forge->addForeignKey('id_pelanggan','pelanggan','id_pelanggan');
        $this->forge->createTable('reservasi');


    }

    public function down()
    {
         $this->forge->dropTable('reservasi');
    }
}
