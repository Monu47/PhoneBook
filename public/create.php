
<?php
require "common.php";
require "../config.php";
try {
  $connection = new PDO($dsn, $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sqlm = "SELECT * FROM users";

  $statements = $connection->prepare($sqlm);
  $statements->execute();

  $results = $statements->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php if (isset($_POST['submit'])) {
  try {
    $conn = new PDO($dsn, $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $new_user = array(
  "firstname" => $_POST['firstname'],
  "Phone" => $_POST['Phone']
);

 
$sql = sprintf(
  "INSERT INTO %s (%s) values (%s)",
  "users",
  implode(", ", array_keys($new_user)),
  ":" . implode(", :", array_keys($new_user))
);

$statement = $conn->prepare($sql);
$statement->execute($new_user);

  } catch(PDOException $error) {
    echo '<script>alert("Contact exist previously");
    window.location.replace("create.php"); </script>';
  }

}?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Simple Database App</title>

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

  <body>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php include "templates/header.php"; ?>
  <?php if (isset($_POST['submit']) && $statement) { ?>
    <?php echo '<script>alert("Contact successfully created");
               window.location.replace("create.php"); </script>';?>
<?php } ?>
   
    <div class="this_form">CREATE CONTACT</div>
  <div class="create_container" >  <form method="post">
      <div class="create_form"><label for="firstname">Name  </label>
      <input type="text" name="firstname" id="firstname"></div>
     <div class="create_form"> <label for="Phone">Phone</label>
      <input type="text" name="Phone" id="Phone" ></div>
      <div class="create_form"><input type="submit" name="submit" value="Submit" class="btn btn-primary mb-2"></div>
    </form>
  </div>

  <div class="this_form">CONTACT LIST</div>
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr >
      <th >First Name</th>
      <th>Phone Number</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($results as $row) : ?>
    <tr >
      <td><?php echo escape($row["firstname"]); ?></td>
      <td><?php echo escape($row["Phone"]); ?></td>
      <td><a href="update.php?firstname=<?php echo escape($row["firstname"]); ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true" >Update Contact</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>

    <?php include "templates/footer.php"; ?>
  </body>
</html>
