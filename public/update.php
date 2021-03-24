<?php
require "common.php";
require "../config.php";
if (isset($_POST['submit'])) {
  try {
  
      $connection = new PDO($dsn, $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user =[
      "firstname" => $_POST['firstname'],
      "Phone"  => $_POST['Phone'],
    ];

    $sql = "UPDATE users
            SET firstname = :firstname,
              Phone = :Phone
            WHERE firstname = :firstname";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

  if (isset($_GET['firstname'])) {
    try {

      $connection = new PDO($dsn, $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $firstname = $_GET['firstname'];
      $sql = "SELECT * FROM users WHERE firstname = :firstname";
      $statement = $connection->prepare($sql);
      $statement->bindValue(':firstname', $firstname);
      $statement->execute();
  
      $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  } else {
    echo "Something went wrong!";
    exit;
  }?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>

  <div class="alert alert-success" role="alert">
   Contact <?php echo escape($_POST['firstname']); ?> successfully updated.
  </div>


<?php endif; ?>

<div class="this_edit">Edit Contact Details of <?php echo escape($firstname) ?></div>
<head> <link rel="stylesheet" href="css/style.css" /></head>
<div class="create_container"><form method="post">
    <?php foreach ($user as $key => $value) : ?>
   <div class="create_form">   <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'firstname' ? 'readonly' : null); ?>></div>
    <?php endforeach; ?>
    <div class="create_form"><input type="submit" name="submit" value="Submit" class="btn btn-primary mb-2" ></div>
</form>
</div>
<?php require "templates/footer.php"; ?>