<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLayananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_layanan'    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'kode_layanan'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
                'null'              => false
            ],
            'nama_layanan'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => false
            ],
            'deskripsi_layanan' => [
                'type'              => 'TEXT',
                'null'              => true
            ]
            ]);
        $this->forge->addKey('id_layanan', true);
        $this->forge->createTable('layanan');
    }

    public function down()
    {
        $this->forge->dropTable('layanan');
    }
}
