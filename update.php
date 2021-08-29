<?php
    if(isset($_POST['edit']))
    {
        include "conn.php";        
        $my_id=$_POST['id'];
        $full_name = $_POST['full_name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
//-------------------------------------- Mobile no. validation----------------------------------------------//        
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
            $sql ="UPDATE signup SET full_name= '{$full_name}',mobile='{$mobile}',email='{$email}',psw='{$password}' where id='{$my_id}'";
            $result = mysqli_query($conn,$sql) or die("Query unsuccessful.");
            if($result)
            { ?>
                <script> 
                    alert("Update Successful.");
                </script>
            <?php
            }else{ ?>
                <script> 
                    alert("Update fail.");
                </script>                
            <?php
            }
            header("Location:http://localhost:8081/crm/data.php?email1=Niki%40gmail.com&psw1=cd");
        }  
    }
    mysqli_close($conn);
?>
                
