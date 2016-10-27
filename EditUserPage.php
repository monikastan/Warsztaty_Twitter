<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit User Page</title>
    </head>
    <body>

<?php
session_start();
require_once 'src/connection.php';
require_once 'src/User.php';
require_once 'misc.php';

if (isset($_SESSION['userId'])) {
    $activeUser = User::loadUserById($conn, $_SESSION['userId']);  
    printHeaderLoggedUser('Edit user page', $activeUser->getUsername());
} else {
    printHeaderNotLoggedUser('Edit user page');
    die('No logged user');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // sprawdzamy czy zmieniac haslo
    if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
        if (strlen(trim($_POST['pass1'])) == 0 && strlen(trim($_POST['pass2']))==0) {
            $passChange=0; // nie zmieniamy hasla bo puste przyszlo
        } else {
            if ((trim($_POST['pass1'])==trim($_POST['pass2']))) {
                $newPass = trim($_POST['pass1']);
                $passChange=1; // nowe haslo ok
            } else {
                $passChange=-1; // hasla rozne - nic nie updateujemy, nawet username
            }
                
        }
    }
    
    //sprawdzamy czy zmieniac username (czy przyszedl wypelniony)
    if (isset($_POST['username']) && strlen(trim($_POST['username']))>0) {
        $newUserName=trim($_POST['username']);
    } else {
        $newUserName='';
    }

    if ($passChange==0 && $newUserName=='') {
        echo 'Nothing to change.';
    } elseif ($passChange != -1) {
        
        if ($passChange == 1) {  $activeUser->setPassword($newPass);  }
        if ($newUserName != '') {  $activeUser->setUserName($newUserName);  }

        if ($activeUser->saveToDB($conn) == true) {
           echo "Changes were done correctly! <br>Your user data has changed.";
           
        } else {
           echo "Problem when updating user data.";
        }
    } else {
        echo 'Your passwords are different! Try again!';
    }
}

$conn->close();
$conn = null;
?>

        <br><br>
<div>
    <form method="post">
        <label>Change your name (empty for no change):</label><br>
        <input name="username" type="text" maxlength="255" value=""/><br>
        <label>Change your password (empty for no change):</label><br>
        <input name="pass1" type="password" maxlength="255" value=""/><br>
        <label>Confirm your new password:</label><br>
        <input name="pass2" type="password" maxlength="255" value=""/><br><br>
        <input type="submit" name="submit" value="Change"><br><br>
    </form>
</div>
</body>
</html>