<!DOCTYPE html>
<?php
require './sql/connection.php';
?>
<html>
<head>
<title>Shopping</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require './sql/getFromDatabase.php';
    if($LoginSuccess)
    {
        header('Location: amazon.php');
    }
        
}
?>
<body>
    <div class="loginDiv">
    <button id="buttonRegister" onclick="hideLogin();">Register</button>
    <button id="buttonLogin" onclick="hideRegister();">Login</button>
    
    <!--Form for registration-->
    <form id="register" action='index.php' method="post">
        <i class="fa fa-user-o" style="color: turquoise" aria-hidden="true"><input type="text" name="fname" id="fname" placeholder="First Name" required></i><br>
        <i class="fa fa-user-o" style="color: turquoise" aria-hidden="true"><input type="text" name="lname" id="lname" placeholder="Last Name" required></i><br>
        <i class="fa fa-envelope" style="color: turquoise" aria-hidden="true"><input type="text" name="email" id="email" placeholder="Email" required></i><br>
        <i class="fa fa-key" style="color: turquoise" aria-hidden="true"><input type="password" name="passwd" id="passwd" placeholder="Password" required></i><br>
        <br><input class="submit" type="submit" style="background-color: turquoise;height: 35px;" value="Submit" onclick="return Validate()"/>
    </form>
    
    <!--Form for login-->
    <form id="login" action='' method="post">
        <i class="fa fa-envelope" style="color: turquoise" aria-hidden="true"><input type="text" name="emailLogin" id="emailLogin" placeholder="Email" required></i><br>
        <i class="fa fa-key" style="color: turquoise" aria-hidden="true"><input type="password" name="passwdLogin" id="passwdLogin" placeholder="Password" required></i><br>
        <br><input class="submit" type="submit" style="background-color: turquoise;height: 35px;" value="Submit" onclick="return loginValidate()"/>
    </form>
</div>
   
<script>
    
    function hideRegister()
        {
            document.getElementById("register").style.display="none";
            document.getElementById("login").style.display="block";
        }
        
    function hideLogin()
        {
            document.getElementById("register").style.display="block";
            document.getElementById("login").style.display="none";
        }
        
    function Validate()
        {
            var letters = "[a-zA-Z][a-zA-Z\s]*";
            var password = "[a-zA-Z0-9][^\w\s]*";
            var firstName = document.getElementById("fname").value;
            var lastName = document.getElementById("lname").value;
            if(!(/^[a-zA-Z]*$/g.test(firstName)) || !(/^[a-zA-Z]*$/g.test(lastName)))
                {
                    alert ("Invalid name format");
                    return false;
                }
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value) === false)
                {  
                    alert("You have entered an invalid email address!")  
                    return false;
                }  
            if (!(password.test(document.getElementById("passwd").value)))  
                {  
                    alert("You have entered an invalid password!");  
                    return false;
                }    
            }
           
           function loginValidate()
            {
                var password = "[a-zA-Z0-9][^\w\s]*";
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("emailLogin").value) === false)
                    {  
                        alert("You have entered an invalid email address!")  
                        return false;
                    }
                if (!(password.test(document.getElementById("passwdLogin").value)))  
                    {  
                        alert("You have entered an invalid password!");  
                        return false;
                    } 
            }     
        </script>
</body>
</html>
