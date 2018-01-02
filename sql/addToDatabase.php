<?php
include_once 'connection.php';
 
/*------------------Get the value of all the variables of a form--------------------*/
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'passwd');

/*------------------Encrypt the password and generate a salt string--------------------*/
if($password != '')
{
  $md5Password = md5($password);                        //Encrpt the password and generate a string
  $salt = bin2hex(openssl_random_pseudo_bytes(12));     //Generate a salt string
  $combine = $salt.$md5Password;                        //Append password string to salt
  $finalMD5 = md5($combine);                            //Encrypt salt and password together
}
else{
  return false;
}

//$newstr = filter_var($email, FILTER_SANITIZE_STRING);
//$val = mysqli_real_escape_string($con, $email);

$full_name = $first_name . ' ' . $last_name;
//$newstr = filter_var($str, FILTER_SANITIZE_STRING);
if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $query = $con->query("INSERT INTO first_table (full_name,email,password,salt) 
                VALUES ('$full_name','$email','$finalMD5','$salt')");
      if($query){
        echo "Added";
        return true;
      }
      else {
        echo "Not added";
        echo $con->error;
        return false;
      }
    }
?>
