<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
    </head>
    <body>
<?php
        //<a href="PageLogin.php"><img src ="ptak.jpg" height="60" width="60" title="Twitter"></a><font size="2">Twitter v.1.0 by Monika Serafinska</font><br><br>
     
require_once 'connection.php';
require_once 'User.php';
require_once 'misc.php';

printHeaderNotLoggedUser('Login page');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        if(strlen(trim($_POST['email']))>0 && strlen(trim($_POST['pass']))>0) {
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);

            $id = User::checkUserPasswordGetId($conn, $email, $pass);

            if ($id!= -1) {
                $_SESSION['userId'] = $id; 
                header('location: index.php');              
            } else {
                echo '<span style="color:red">Invalid email or password.</span><br><br>';                
            }
        }
        
    }
}

$conn->close();
$conn = null;
?>


    
    <div>
        <form method="post" action="PageLogin.php">
            <label>Email:</label><br>
            <input name="email" type="text" maxlength="255" value=""/><br>
            <label>Password:</label><br>
            <input name="pass" type="password" maxlength="255" value=""/><br><br>
            <input type="submit" name="submit" value="Login"><br><br>
        </form>
    </div>

        If you are a new user you have to register first on <a href="PageRegistration.php">Registration page</a>


    </body>
</html>
