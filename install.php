

<?php

$servername = "localhost";
$username = "roots";
$password = "Root1234@";
$dbname     = "contact"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // setting the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "CREATE DATABASE contact;
             use contact;

  CREATE TABLE users (
    firstname VARCHAR(60) NOT NULL PRIMARY KEY,
    Phone bigint(10) UNSIGNED NOT NULL
  )";
    // using exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully with the name contact";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }
$conn = null;
?>

