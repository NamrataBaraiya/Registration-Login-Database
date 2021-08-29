<!DOCTYPE html>
<html lang="">
    <head>
        <title>Save detatiles</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="style.css">
    </head>
<body> 
   <div class="container">
            <div class="row">
                <div class = "col-sm-3"></div>
                <div class = "col-sm-6 form">
                <div class='field'>
                    <lable class="top"><b>Update Data</b></lable><hr/>
                        <?php 
                            include "conn.php"; 
                                $id=$_GET['id'];            
                                $sql= "SELECT*FROM signup where id={$id}";
                                $result = mysqli_query($conn,$sql) or die("Query unsucessful!!!!");
                                if(mysqli_num_rows($result)>0)        
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                 {  
                                ?>
                                <form action = "update.php" method="POST">
                                <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                                <input type="text" class="form-control" name="full_name"id="exampleInputName"value="<?php echo $row['full_name']; ?>" placeholder="Enter full name" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile" id="exampleInputNumber" value="<?php echo $row['mobile']; ?>" placeholder="Enter mobile number" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"value="<?php echo $row['email']; ?>" placeholder="Enter email id" required/>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="psw" id="exampleInputPassword1" value="<?php echo $row['psw']; ?>" placeholder="Enter password" required/>
                                </div>                                
                                <input type="submit" name="edit" value="Update" class="form_btn btn btn-primary"/>
                                </form>
                                <?php
                                }
                                }
                                ?>                    
                   </div>
                <div class = "col-sm-4"></div>
            </div>
    </div>
</body>
</html>
