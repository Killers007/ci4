<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->modifyColumn('users', [
            'juhdi' => [
            	'name' => 'tes',
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
