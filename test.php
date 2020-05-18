<?php

include ('classes/dbh.class.php');

$dbh = new Dbh();

echo strlen (uniqid('', true));

var_dump($dbh -> GetDB());

echo strlen('$2y$10$VMMO3W/bYmCB7pX4kNFmzOIGVhD518ppZv7NlniNjoxPHr7HW8oS2');