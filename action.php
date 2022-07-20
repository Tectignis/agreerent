<?php
include("config/config.php");
if(isset($_POST['submi'])){
    $name=$_POST['cname'];
    $contact=$_POST['contact'];
    $emai=$_POST['email'];

    $sql="insert into con(name,email,contact) values('$name','$emai','$contact')";
    $query=mysqli_query($conn,$sql);

    if($query==1){
        echo '<script>alert("data successfully submitted");</script>';
        header("location:check.php");
    }else{
        echo '<script>alert("oops... something went wrong")</script>';
    }
}
?>