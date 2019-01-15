<?php
//create the connection
$dbname = 'php2';
$host = 'localhost';
$username = 'root';
$password = 'root';
$dsn='mysql:dbname='.$dbname.';host='.$host.';';

//try to connect
$connection = new PDO($dsn,$username,$password);
