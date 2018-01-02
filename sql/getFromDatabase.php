<?php 
    //include_once 'connection.php';
    
    /*------------------Get the value of all the variables of a form--------------------*/
    $email = filter_input(INPUT_POST, 'emailLogin');
    $password = filter_input(INPUT_POST, 'passwdLogin');
    
    /*------------------Initialize a login bool variable--------------------*/
    $LoginSuccess = false;
    
    /*------------------Run a query to fetch password for an email id-------------------*/
    $query = $con->query("SELECT * FROM first_table WHERE email = '$email'") or die($con->error);
    $userDetails = $query->fetch_assoc();
    /*------------------Check if email id exists or not-------------------*/
    if($userDetails == null){
        return 'No such user exist';
    }
    else
    {
        $md5UserPass = md5($password);
        $saltFromDB = $userDetails['salt'];
        $password = md5($saltFromDB.$md5UserPass);
        if($password == $userDetails['password']){ 
            $LoginSuccess = true;
            return 'Login Successful';
        }
        else {
            return 'Typed password does not match';
        }
    }
?>
