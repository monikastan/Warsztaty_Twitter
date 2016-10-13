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
        <a href="PageLogin.php"><img src ="ptak.jpg" height="60" width="60" title="Twitter"></a>Twitter v.1.0 by Monika Serafinska<br><br>
        

<?php
require_once 'connection.php';
require_once 'User.php';

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
                echo '<span style="color:red">Invalid email or password.</span>';                
            }
        }
        
    }
}

$conn->close();
$conn = null;
?>


    <h1>Strona logowania:</h1>
    <div>
        <form method="post" action="PageLogin.php">
            <label>Email:</label><br>
            <input name="email" type="text" maxlength="255" value=""/><br>
            <label>Password:</label><br>
            <input name="pass" type="password" maxlength="255" value=""/><br><br>
            <input type="submit" name="submit" value="Login"><br><br>
        </form>
    </div>

        Jezeli jestes nowym uzytkownikiem, zapraszamy do <a href="PageRegistration.php">rejestracji.</a>


    </body>
</html>