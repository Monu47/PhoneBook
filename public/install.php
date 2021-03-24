

<?php
require "../config.php";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // setting the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "CREATE DATABASE contact;
             use contact;

  CREATE TABLE users (
    firstname VARCHAR(60) NOT NULL PRIMARY KEY,
    Phone VARCHAR(10)  NOT NULL
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

