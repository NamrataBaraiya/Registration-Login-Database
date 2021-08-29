<!DOCTYPE html>
<html lang=''>
    <head>
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class = "col-sm-3"></div>
            <div class = "col-sm-6 form">                
                <form name="myform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" >
                    <lable class="top"><b>Login</b></lable><hr/>
                    <div class="mb-3">
                        <label  class="form-label">Email address</label>
                        <input type="email" class="form-control" name = "email"id="exampleInputEmail1" placeholder="Enter email id" required/>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" name="psw" id="exampleInputPassword1" placeholder="Enter password" required/>
                    </div>
                    <input type="submit" name="login" value="Login" class="form_btn btn btn-primary"/>
                    <br>
                    <p>Don't have an account?   <a href="signup.php">Sign Up !!!</a></p>
                </form>
            </div>
            <div class = "col-sm-4"></div>
        </div>
    </div>
    </body>    
</html>

<?php
//-------------------------------------- Email and Password validation----------------------------------------------//   
    if(isset($_POST['login']))
    {                        
        include "conn.php";                        
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $psw =$_POST['psw'];
        $sql="SELECT * from signup where email='{$email}' AND psw='{$psw}'" ;
        $result=mysqli_query($conn,$sql) ;
        if(mysqli_num_rows($result)>0)
        {
            while($row= mysqli_fetch_assoc($result))
            {
                $_SESSION["email"] = $row['email'];
                $_SESSION["id"] = $row['id'];
                $_SESSION["psw"] = $row['psw'];
                header("Location:http://localhost:8081/crm/data.php");
            }
        }
        else
        {?>
            <script> 
                alert("Please enter valid email or password.");
            </script>
        <?php
        }
    }
?>
