<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => "ayumi123!",
		//'password' => DB_PASS,
		'database' => 'fishing',
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => DB_PASS,
		'database' => 'fishing_test',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
}
