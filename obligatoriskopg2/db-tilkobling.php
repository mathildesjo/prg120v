<?php

$host = gatenv('DB_HOST');
$username = gatenv('DB_USER');
$password = gatenv('DB_PASSWORD');
$database = gatenv('DB_DATABASE');

$db=mysqli_connect($host,$username,$password,$database) or die ("ikke kontakt med database-server");

?>
