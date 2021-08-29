<!DOCTYPE html>
<html lang=" ">
    <head>
        <title>Add recodes Page</title>
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" language="javascript" src="main1.js"></script>
    </head>
    <body>    
    <div class="container">
            <div class="row">
                <div class = "col-sm-3"></div>
                <div class = "col-sm-6 form">
                    <form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST" name="myform">
                    <lable class="top"><b>Add New Recods</b></lable><hr/>
                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" name="full_name"id="exampleInputName" placeholder="Enter full name" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" id="exampleInputNumber" placeholder="Enter mobile number" required/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email id" required/>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Password</label>
                            <input type="password" class="form-control" name="psw" id="exampleInputPassword1"placeholder="Enter password" required/>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Conform Password</label>
                            <input type="password" class="form-control" name="cpsw" id="exampleInputConformPassword1"placeholder="Enter conform password" required/>
                        </div>

                        <input type="submit" name="add" value=" Add Data"class="form_btn btn btn-primary"/>
                    </form>                
                </div>               
                <div class = "col-sm-4"></div><br><br><br>
            </div>
    </div>
    </body>
</html>

<?php    
    if(isset($_POST['add']))
    {                           
        include "conn.php";
        $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $psw = mysqli_real_escape_string($conn,$_POST['psw']);
        $cpsw =mysqli_real_escape_string($conn, $_POST['cpsw']);                                     
        $emailsql="SELECT * from signup where email='{$email}'" ;
        $emailresult=mysqli_query($conn,$emailsql) ;                        
//-------------------------------------- Mobile no. validation-----------------------------------------//     
        if(strlen($_POST['mobile'])<10 )
        { ?>
            <script> 
                alert("Mobile number should be of 10 digits.");
            </script>
        <?php
        }else if(strlen($_POST['mobile'])>10 )
        { ?>
            <script> 
                alert("Mobile number should be of 10 digits.");
            </script>
        <?php
        }else if(!preg_match("/^[6-9]\d{9}$/",$mobile))
        {?>
            <script> 
                alert("Invalid mobile number.");
            </script>
        <?php  
//-------------------------------------- Email validation----------------------------------------------//   
        }else if(mysqli_num_rows($emailresult)>0)
        {?>
            <script> 
                alert("Email already exists. Please enter another one.");
            </script>
        <?php
        }else
        {
//-------------------------------------- Password validation-------------------------------------------// 
            if($password === $cpassword)
            {
                $sql="INSERT INTO signup(full_name,mobile,email,psw,cpsw)values('{$full_name}','{$mobile}','{$email}','{$psw}','{$cpsw}')";
                $result=mysqli_query($conn,$sql) or die("Query unsuccessfull.");
                if($result)
                { ?>
                    <script> 
                        alert("Data added Successfully.");
                    </script>
                <?php
                header("Location:http://localhost:8081/crm/data.php?email1=Niki%40gmail.com&psw1=niki%23"); 
                }else{ ?>
                    <script> 
                        alert("Data fail.");
                    </script>                
                <?php
                }
            }
            else
            { ?>
                <script> 
                        alert("Passowrd and conform password are not matching.");
                </script>
            <?php               
            }
        }  
    }  
?>