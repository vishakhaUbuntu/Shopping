<?php 
    //Get all field values
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $email = 'vishaha@ayoga.in';
    $password = '123456';
    $LoginSuccess = false;
    //$con = getConnectionString();

    $query = $con->query("SELECT * FROM first_table WHERE email = '$email'") or die($con->error);
    $userDetails = $query->fetch_assoc();

    if($userDetails == null){
        echo 'No such user exist';
    }
    else
    {
        if($password == $userDetails['password']){ 
            echo 'Login Successful';
            $LoginSuccess = true;
        }
        else {
            echo 'Typed password does not match';
        }
    }
?>