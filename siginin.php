<?php
session_start();
if(isset($_SESSION['email'])){
    include ("app.php");
    include("Fun.php");


}


else{
    echo "<script>alert('You are not login!!'); location.href='app.php';</script>";
}

?>