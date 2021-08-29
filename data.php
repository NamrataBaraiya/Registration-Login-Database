<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Database</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>        
        <div class="container">
            <div class="row"><br>
                <div class = "col-sm-2"></div>
                <div class = "col-sm-6 ">
                    <center><fieldset  class="f1">
                    <h2 style="float:left;"><b>User Database</b></h2>
                    <h2> <button  style="float:right; hight: 20px;"><a href="add.php">Add New Recode</a></button> </h2>  
                    <br><br><br>
                    <hr/>
                    <?php include "conn.php";
                    $sql="select*from signup";
                    $result = mysqli_query($conn,$sql) or die("Query Unsucessfull.");
                    $count = mysqli_num_rows($result);
                    echo "No. of Registered Users :".$count; 
                    ?>
                    <hr/><br>
                    <table border="1" cellspacing="0">
                        <tr>
                            <th id="" class="centre">Id</th>
                            <th id="" class="center">User Name</th>
                            <th id="" class="center">Mobile no.</th>
                            <th id="" class="center">Email</th>
                            <th id="" class="center">Password</th>     
                            <th id="" class="center">Action</th>
                    
                        </tr>
                       <?php
                    
                        $records=mysqli_query($conn,"select*from signup");
                        while($data=mysqli_fetch_array($records))
                        {
                        ?>
                        <tr>
                            <td><?php echo $data['id'];?></td>
                            <td><?php echo $data['full_name'];?></td>
                            <td><?php echo $data['mobile'];?></td>
                            <td><?php echo $data['email'];?></td>
                            <td><?php echo $data['psw'];?></td>
                            <td><button ><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></button>
                            <button class="Abutton"  ><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></button></td>
                        </tr>
                        <?php   
                        }
                        ?>
                    </table>           
                    <br>
                    <hr>Want to logout ?<a href="logout.php">&nbspClick here..!!!</a>
                    </fieldset></center>
                </div>
                 <div class = "col-sm-4 "></div><br><br>            
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>
</html>