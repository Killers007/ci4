<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', [
            'juhdi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
