<?php
include "conn.php";
echo "welcome";
session_start();
session_unset();
session_destroy();
header("Location:http://localhost:8081/crm/login.php");

?>