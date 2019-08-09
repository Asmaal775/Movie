<?php 
session_start();

include ("db_conn.php");
if (isset($_POST['update'])){
                    $id = $_GET['id'];
                    $title=$_POST['title'];
                    $des=$_POST['des'];
                    $image = $_FILES['image']['name'];
    if (!empty($title)){
        if (!empty($des)){
            if (!empty($image)){
                    
            		
                    $qry="UPDATE item set  pic='$image', title='$title', des='$des' where id='$id '";
                    $result=mysqli_query($conn,$qry);
                    if(!$result)
                    {
                    	die('Error: ' . mysqli_error($conn));
                    }
                    else
                    {
                    	move_uploaded_file($_FILES['image']['tmp_name'], "pict/$image");
                    	echo "<script>alert('You update your movie'); location.href='fun.php';</script>";   
                     }
     } 
     else {echo "<script>alert('You should enter image your movie'); window.history.back();</script>";
 }
 }
 else {echo "<script>alert('You should enter Description your movie'); window.history.back();</script>";
}
}
else {echo "<script>alert('You should enter title your movie'); window.history.back();</script>";
}
}
?>