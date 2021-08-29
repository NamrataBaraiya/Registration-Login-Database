<?php
 include 'conn.php';
    $id=$_GET['id'];
    $sql = "DELETE FROM signup WHERE id= {$id}";
    $result = mysqli_query($conn,$sql) or die("Query unsuccessful!!!!!!!!!");
    header("Location:http://localhost:8081/crm/data.php?email1=Niki%40gmail.com&psw1=cd ");
    mysqli_close($conn);
?>