<?php
include("db_conn.php");
if (!$conn){
die('Could not connect: ' . mysql_error());
}
elseif (isset($_POST['submit'])){
     	$title=$_POST['title'];
     	$des=$_POST['des'];
        $image = $_FILES['image']['name'];
        saveimage($title,$des,$image);
     }
    function saveimage($title,$des,$image)
    {    include("db_conn.php");

        $qry="INSERT INTO item (id, pic, title, des) values (NULL,'$image','$title','$des')";
        $result=mysqli_query($conn,$qry);
        if(!$result)
        {
        	die('Error: ' . mysqli_error($conn));
        }
        else
        {
        	move_uploaded_file($_FILES['image']['tmp_name'], "pict/$image");
        	echo "<script>alert('You post your movie'); location.href='fun.php';</script>";   
         }
}	    



$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/bf4451859d.js"></script>
    <link rel="stylesheet" href="css/index.css">


<form class="textback" method="post" action="add.php" enctype="multipart/form-data">
	<div class="form-group card-body card bg-dark text-white">
    <label for="exampleFormControlFile1">Upload the poster </label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="form-group card-body card bg-dark text-white">
    <label for="formGroupExampleInput">The title of the movie :</label>
    <input name=" title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter title">
  </div>
  <div class="form-group card-body card bg-dark text-white">
    <label for="exampleFormControlTextarea1">The description of the movie :</label>
    <textarea name=" des" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>