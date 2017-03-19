#! /usr/bin/php
<?php
	$DB_DSN = 'mysql:;host=localhost';
	$DB_USER = 'root';
	$DB_PASSWORD = 'root';
	try {
	    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    die ('Connexion échouée : ' . $e->getMessage());
	}
	$lines = file_get_contents("../../db/camagru_db.sql");

	$lines = explode(';', $lines);
	foreach ($lines as $line)
	{
		$line = trim($line);
		if (empty($line)) continue;
		$dbh->query(trim($line));
	}

	echo "Database created\n";
