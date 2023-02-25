<?php
    $conn=new mysqli('localhost','root','','rms');
    if(!$conn){
      die(mysqli_error($conn)); 
      
    }
?>