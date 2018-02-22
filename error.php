<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
</head>
<body>
    <div style="text-align: center; background-color: turquoise; padding-left: 5%;padding-right: 5%; position: absolute; size: 300px; top: 45%; left: 45%">
        <p style="color: purple">
            <?php  
            echo $GLOBALS['error'];
                switch ($error){
                    case 1:{
                        echo '<h1 style="">Success!!</h1>';
                        echo "Registered Successfully!";
                        echo '<a href="amazon.php">Proceed</a>';
                        break;
                    }
                    case 2:{
                        echo '<h1 style="">Error</h1>';
                        echo "Unable to Register.<br>";
                        echo '<a href="index.php">Try Again</a>';
                        break;
                    }
                    case 3:{
                        echo '<h1 style="">Success!!</h1>';
                        echo "Login Successful!";
                        echo '<a href="amazon.php">Proceed</a>';
                        break;
                    }
                    case 4:{
                        echo '<h1 style="">Alert!!</h1>';
                        echo "Typed password does not match";
                        $GLOBALS['error'] = 5;
                        echo '<a href="index.php">Try Again</a>';
                        break;
                    }
                    default:{
                        echo '<h1 style="">Alert!!</h1>';
                        break;
                    }
                }
            ?>
        </p>     
    </div>
</body>
</html>
