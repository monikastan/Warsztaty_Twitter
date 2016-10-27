<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Page</title>
    </head>
    <body>
 
<?php
session_start();
require_once 'src/connection.php';
require_once 'src/User.php';
require_once 'misc.php';

printHeaderNotLoggedUser('Registration');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass'])) {
        if(strlen(trim($_POST['username']))>0 && strlen(trim($_POST['email']))>0 && strlen(trim($_POST['pass']))>0) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['pass']);
            
            $query = "SELECT * FROM Users WHERE email = '$email'";
            $result = $conn->query($query);
            
            if ($result == TRUE) {
                // zapytanie na bazie wykonane prawidłowo (bez błędów)

                if ($result->num_rows >0) {
                    echo '<span style="color:red">This email already exists.</span><br><br>';
                } else {
            
                    $newUser = new User();
                    $newUser->setUsername($username);
                    $newUser->setEmail($email);
                    $newUser->setPassword($pass);


                    if($newUser->saveToDB($conn)) {
                        header('location: PageLogin.php');
                    } 
            
                }
                        
            }
        }
    }
}

$conn->close();
$conn = null;
?>
   
    <div>
        <form method="post">
            <label>Enter user name:</label><br>
            <input name="username" type="text" maxlength="255" value=""/><br>
            <label>Enter email:</label><br>
            <input name="email" type="text" maxlength="255" value=""/><br>
            <label>Enter password:</label><br>
            <input name="pass" type="password" maxlength="255" value=""/><br><br>
            <input type="submit" name="submit" value="Register"><br><br>
        </form>
    </div>
    </body>
</html>