<?php

//create the connection
$dbname = 'php2';
$host = 'localhost';
$username = 'root';
$password = 'root';
$dsn='mysql:dbname='.$dbname.';host='.$host.';';


try {
  //try to connect
  $connection = new PDO($dsn,$username,$password);

  //insert in a new record
  date_default_timezone_set('America/Denver');
  $time = Date('Y-m-d H:i:s');
  echo "The time is ".$time;

  $insert = "INSERT INTO people (`first_name`,`last_name`,`updated_at`,`created_at`) VALUES ('Joanne','Stone',".$time.",now())";
  //$connection->exec($insert);


  //update a record
  $update = "UPDATE people SET last_name='Ross' WHERE first_name ='Joanne'";
  //$connection->exec($update);

  //delete
  $delete = "DELETE FROM people WHERE id=3 LIMIT 1";
  $connection->exec($delete);

  //query the database
  $sql = "SELECT * FROM people";

  //get the response from the database
  $result = $connection->query($sql);

  //loop through the response and pull out individual rows of data
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print '<pre>';
    print_r($row);
    print '</pre>';
  }

  
} catch (Exception $e) {
  //catch the error
  echo $e;
}


?>

