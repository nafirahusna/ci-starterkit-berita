<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // 1. roles
        $this->forge->addField([
            'id'   => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'name' => ['type'=>'VARCHAR','constraint'=>50]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // 2. users
        $this->forge->addField([
            'id'         => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'email'      => ['type'=>'VARCHAR','constraint'=>100,'unique'=>true],
            'password'   => ['type'=>'VARCHAR','constraint'=>255],
            'name'       => ['type'=>'VARCHAR','constraint'=>100],
            'role_id'    => ['type'=>'INT','unsigned'=>true],
            'created_at' => ['type'=>'DATETIME','null'=>true],
            'updated_at' => ['type'=>'DATETIME','null'=>true]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role_id','roles','id','CASCADE','CASCADE');
        $this->forge->createTable('users');

        // 3. categories
        $this->forge->addField([
            'id'   => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'name' => ['type'=>'VARCHAR','constraint'=>100]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories');

        // 4. news
        $this->forge->addField([
            'id'           => ['type'=>'INT','unsigned'=>true,'auto_increment'=>true],
            'title'        => ['type'=>'VARCHAR','constraint'=>255],
            'slug'         => ['type'=>'VARCHAR','constraint'=>255,'unique'=>true],
            'content'      => ['type'=>'TEXT'],
            'image'        => ['type'=>'VARCHAR','constraint'=>255,'null'=>true],
            'category_id'  => ['type'=>'INT','unsigned'=>true],
            'author_id'    => ['type'=>'INT','unsigned'=>true],
            'is_published' => ['type'=>'BOOLEAN','default'=>false],
            'created_at'   => ['type'=>'DATETIME','null'=>true],
            'updated_at'   => ['type'=>'DATETIME','null'=>true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id','categories','id','RESTRICT','CASCADE');
        $this->forge->addForeignKey('author_id','users','id','CASCADE','CASCADE');
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
        $this->forge->dropTable('categories');
        $this->forge->dropTable('users');
        $this->forge->dropTable('roles');
    }
}

