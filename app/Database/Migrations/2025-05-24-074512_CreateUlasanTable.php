<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUlasanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ulasan' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pelanggan' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => false,
            ],
            'id_layanan' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => false,
            ],
            'kualitas_layanan' => [
                'type'       => 'INT',
                'constraint' => 1,
                'unsigned'   => true,
            ],
            'kenyamanan_fasilitas' => [
                'type'       => 'INT',
                'constraint' => 1,
                'unsigned'   => true,
            ],
            'kesesuaian_harga' => [
                'type'       => 'INT',
                'constraint' => 1,
                'unsigned'   => true,
            ],
            'keinginan_layanan_tambahan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
                'null'              => false
            ],
            'ingin_dihubungi_promo' => [
                'type'    => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id_ulasan', true); // Primary Key
        $this->forge->createTable('ulasan');

        // Tambahkan foreign key:
        $this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_layanan', 'layanan', 'id_layanan', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('ulasan');
    }
}
