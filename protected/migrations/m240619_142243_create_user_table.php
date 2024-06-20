<?php

class m240619_142243_create_user_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'id' => 'pk',
			'username' => 'varchar(50) NOT NULL UNIQUE',
			'password' => 'varchar(100) NOT NULL',
			'role' => "enum('admin', 'pegawai', 'user') DEFAULT 'user'",
		));
	}

	public function down()
	{
		$this->dropTable('user');
	}

	// public function up()
	// {
	// }

	// public function down()
	// {
	// 	echo "m240619_142243_create_user_table does not support migration down.\n";
	// 	return false;
	// }

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
