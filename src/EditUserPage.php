<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Page</title>
    </head>
    <body>
        <img src ="ptak.jpg" height="60" width="60"><br>


<?php
require_once 'connection.php';
require_once 'User.php';

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
                    echo '<span style="color:red">Ten email jest juz zajety- sprobuj ponownie!</span>';
                } else {
            
                    $newUser = new User();
                    $newUser->setUsername($username);
                    $newUser->setEmail($email);
                    $newUser->setPassword($pass);


                    if($newUser->saveToDB($conn)) {

                        echo "Rejestracja przebiegla pomyslnie! <br>Twoje imie to: ". $newUser->getUsername(). ", a twoj email to: ".$newUser->getEmail();
                        echo '<br>Przejdz do  <a href="PageLogin.php">logowania.</a>';
                    } 
            
                }
                        
            }
        }
    }
}

$conn->close();
$conn = null;
?>






        <h1>Strona rejestracji nowego uzytkownika:</h1>
        <div>
            <form method="post">
                <label>Podaj swoje imie:</label><br>
                <input name="username" type="text" maxlength="255" value=""/><br>
                <label>Podaj swoj email:</label><br>
                <input name="email" type="text" maxlength="255" value=""/><br>
                <label>Podaj swoje haslo:</label><br>
                <input name="pass" type="password" maxlength="255" value=""/><br><br>
                <input type="submit" name="submit" value="Rejestruj"><br><br>
            </form>
        </div>
    </body>
</html>