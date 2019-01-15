<?php
//connect to the database
require_once('connection.php');

  //submit the form, check that the button was pressed
  if($_POST['add_person'] == 'Add New Person') {
    // print '<pre>';
    // print_r($_POST);
    // print '</pre>';
    //echo 'form submitted';

    //grab the $_POST data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    //insert it into the database

    //set the timezone to Denver
    date_default_timezone_set('America/Denver');
    $time = Date('Y-m-d H:i:s');

    $insert = "INSERT INTO people (`first_name`,`last_name`,`updated_at`,`created_at`) VALUES ('".$first_name."','".$last_name."','".$time."','".$time."')";
    //echo $insert;
    $connection->exec($insert);

  }

  

  


  //display the results
  $sql = "SELECT * FROM people";

  //get the response from the database
  $result = $connection->query($sql);

  //loop through the response and pull out individual rows of data
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print '<pre>';
    print_r($row);
    print '</pre>';
  }
?>


<form method="POST" action="display.php">
  <input type="text" name="first_name"><br>
  <input type="text" name="last_name"><br>
  <input type="submit" name="add_person" value="Add New Person">
</form>
