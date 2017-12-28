<?php
include_once 'connection.php';
    
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['passwd'];

//if($first_name && $last_name && $email && $password){
$con = getConnectionString();
//$newstr = filter_var($email, FILTER_SANITIZE_STRING);
//$val = mysqli_real_escape_string($con, $email);

$full_name = $first_name . ' ' . $last_name;
//$newstr = filter_var($str, FILTER_SANITIZE_STRING);

if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $query = $con->query("INSERT INTO first_table (full_name,email,password,phone) 
                VALUES ('$full_name','$email','$password','9479639735')");
      if($query){
        echo "Added";
        return true;
      }
      else {
        echo "Not added";
        return false;
      }
    }
?>
