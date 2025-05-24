<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan'    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_pelanggan'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => false
            ],
            'nama_ortu_pelanggan'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => true
            ],
            'usia_pelanggan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '20',
                'null'              => true
            ],
            'no_hp_pelanggan'   => [
                'type'              => 'VARCHAR',
                'null'              => false,
                'constraint'        => '15'
            ],
            'kota_pelanggan'    => [
                'type'              => 'VARCHAR',
                'null'              => false,
                'constraint'        => '20' 
            ],
            'status_member'     => [
                'type'              => 'INT',
                'null'              => false,
                'constraint'        => 2
            ]
            ]);
            
            $this->forge->addKey('id_pelanggan', true);
            $this->forge->createTable('pelanggan');

    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
