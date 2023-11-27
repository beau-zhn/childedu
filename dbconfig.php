<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'h70237xf_edu';
	$DB_PASS = 'do123!';
	$DB_NAME = 'h70237xf_edu';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
