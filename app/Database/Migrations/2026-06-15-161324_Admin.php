<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],

            'profile_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            // Email Verification OTP
            'otp' => [
                'type'       => 'VARCHAR',
                'constraint' => 6,
                'null'       => true,
            ],

            'otp_expiry' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            // Account Status
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],

            'activation_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            // Forgot Password
            'reset_token' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'reset_token_expiry' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');

        $this->forge->createTable('admin');
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}