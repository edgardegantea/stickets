<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 80],
            'email'         => ['type' => 'varchar', 'constraint' => 100],
            'phone_no'      => ['type' => 'varchar', 'constraint' => 20],
            'role'          => ['type' => 'varchar', 'constraint' => 20],
            'password'      => ['type' => 'varchar', 'constraint' => 255],
            'created_at'    => ['timestamp default CURRENT_TIMESTAMP'],
            'updated_at'    => ['timestamp default CURRENT_TIMESTAMP nullable'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_users', true);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_users', true);
    }
}
