<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeIdLayananDatatypeOnUlasan extends Migration
{
    public function up()
    {
        // Drop the foreign key constraint if it exists
        $this->db->query('ALTER TABLE ulasan DROP FOREIGN KEY ulasan_id_layanan_foreign');

        // Change the column from INT to TEXT
        $this->forge->modifyColumn('ulasan', [
            'id_layanan' => [
                'name'       => 'id_layanan',
                'type'       => 'VARCHAR',
                'null'       => true,
                'constraint' => 30,
            ],
        ]);
    }

    public function down()
    {
        // Revert back to INT (assuming previous constraint is re-added manually)
        $this->forge->modifyColumn('ulasan', [
            'id_layanan' => [
                'name'       => 'id_layanan',
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
        ]);
    }
}
