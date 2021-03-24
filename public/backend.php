<?php
 require "../config.php";
if(isset($_POST['search'])){
    $search = $_POST['search'];
    $search = "%$search%";
    if(strlen($search)>0){
        try {
            $connection = new PDO($dsn, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM users WHERE firstname LIKE :s ";
          
            $stmt = $connection->prepare($sql);
            $stmt->bindParam("s",$search);
            $stmt->execute();
            
            while($row = $stmt->fetch()){
                $firstname = $row['firstname'];
                $Phone = $row['Phone'];

                echo "<div  class='list_contact'>
                </br>
                $firstname
                </br>
                $Phone
                </br>
               <div class='list_button' > <a href='update.php?firstname=$firstname' class='btn btn-secondary btn-lg active' role='button' aria-pressed='true'>Update Contact</a></div>
    
                </div>";
            }
          
          } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
          }
    }
};
?>