<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class CreateTerapisTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_terapis'    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama_terapis'  => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => false
            ],
            ]);
            
            $this->forge->addKey('id_terapis', true);
            $this->forge->createTable('terapis');

    }

    public function down()
    {
        $this->forge->dropTable('terapis');
    }
}
