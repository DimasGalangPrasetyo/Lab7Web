<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsTerbaruToArtikel extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('is_terbaru', 'artikel')) {
            $this->forge->addColumn('artikel', [
                'is_terbaru' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                    'after'      => 'status',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('is_terbaru', 'artikel')) {
            $this->forge->dropColumn('artikel', 'is_terbaru');
        }
    }
}
