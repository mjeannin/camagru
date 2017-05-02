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
	$file = file_get_contents("../../db/camagru_db.sql");
	$lines = explode(';', $file);
	foreach ($lines as $line)
	{
		$line = trim($line);
		if (empty($line)) continue;
		// echo $line . PHP_EOL;
		try {
			$result = $dbh->query($line);			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	echo "Database created\n";