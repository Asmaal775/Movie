<?php 
session_start();

include ("db_conn.php");
if (isset($_POST['delete'])){
		$id = $_GET['id'];
     	$title=$_POST['title'];
     	$des=$_POST['des'];
        $image = $_FILES['image']['name'];
     
        $qry="DELETE FROM item  where id='$id'";
        $result=mysqli_query($conn,$qry);
        if(!$result)
        {
        	die('Error: ' . mysqli_error($conn));
        }
        else
        {
        	move_uploaded_file($_FILES['image']['tmp_name'], "pict/$image");
        	echo "<script>alert('You remove your movie'); location.href='fun.php';</script>";   
         }
     }
?>