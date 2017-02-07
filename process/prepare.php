<?php

$sth = $dbh->prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories < ? AND couleur = ?');
$sth->execute(array(150, 'rouge'));
$red = $sth->fetchAll();
$sth->execute(array(175, 'jaune'));
$yellow = $sth->fetchAll();