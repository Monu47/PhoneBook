<?php include "templates/header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>                                                                               
$(document).ready(function(){
   $("#search").keyup(function(){
    $.ajax({
        url: "backend.php",
        type: "post",
        data: {search:$(this).val()},
        success:function(result){
          $("#result").html(result);
        }
    });
   });
});
</script>
<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>

<div ><div class="this_form"><div>SEARCH CONTACT</div>
</br>
<input type="text" id="search"/></div>
</p>
<div><span id="result" 
></span></div>
</div>
<?php include "templates/footer.php"; ?>
