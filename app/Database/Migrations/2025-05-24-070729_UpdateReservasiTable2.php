<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateReservasiTable2 extends Migration
{
    public function up()
    {
        // 1. Hapus beberapa kolom
        $this->forge->dropColumn('reservasi', [
            'nama_bunda',
            'nama_anak',
            'usia_anak',
            'nomor_telepon',
            'kota',
            'member'
        ]);

        // 2. Tambahkan kolom baru
        $this->forge->addColumn('reservasi', [
            'id_pelanggan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false
            ],
            'id_layanan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false
            ]
        ]);

        // 3. Tambahkan FOREIGN KEY secara manual (karena tidak bikin table baru)
        $this->db->query('ALTER TABLE reservasi ADD CONSTRAINT fk_reservasi_pelanggan FOREIGN KEY (id_pelanggan) REFERENCES m_pelanggan(id_pelanggan)');
        $this->db->query('ALTER TABLE reservasi ADD CONSTRAINT fk_reservasi_layanan FOREIGN KEY (id_layanan) REFERENCES layanan(id_layanan)');
    }

    public function down()
    {
        // Hapus FOREIGN KEY dulu
        $this->db->query('ALTER TABLE reservasi DROP FOREIGN KEY fk_reservasi_pelanggan');
        $this->db->query('ALTER TABLE reservasi DROP FOREIGN KEY fk_reservasi_layanan');

        // Hapus kolom baru
        $this->forge->dropColumn('reservasi', ['id_pelanggan', 'id_layanan']);

        // Tambahkan kembali kolom lama (optional untuk rollback)
        $this->forge->addColumn('reservasi', [
            'nama_bunda' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => false
            ],
            'nama_anak' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => false
            ],
            'usia_anak' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true
            ],
            'nomor_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => false
            ],
            'kota' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
                'null'       => false
            ],
            'member' => [
                'type' => "ENUM('Member', 'Non Member')",
                'null' => false
            ]
        ]);
    }
}
