<?php
    include 'connect.php';
    if(isset($_GET['deleteId'])){
        $mconcepcionId=$_GET['deleteId'];

        $sql="DELETE FROM maternalconcepcion WHERE mconcepcionId=$mconcepcionId";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Deleted Successfully";
            header('location:maternal.php');
        }else{
            die(mysqli_error($conn));
        }
    }
    ?>