<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitter</title>
    </head>
    <body>
        
<?php
session_start();
require_once 'connection.php';
require_once 'User.php';
require_once 'Tweet.php';
require_once 'Messages.php';
require_once 'misc.php';

if (isset($_SESSION['userId'])) {
    $activeUser = User::loadUserById($conn, $_SESSION['userId']);
    printHeaderLoggedUser("User's tweets", $activeUser->getUsername());
    
} else {
    printHeaderNotLoggedUser("User's tweets");
    die('No logged user');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $userId = $_POST['userId'];
    if (isset($_POST['message'])>0) {

        $message = $_POST['message'];

        $newMessage = new Messages();
        $newMessage->setSenderUserId($_SESSION['userId']);
        $newMessage->setRecipientUserId($userId);
        $newMessage->setText($_POST['message']);
        $newMessage->setCreationDate(date('Y-m-d H:i:s'));

        if($newMessage->saveToDB($conn)) {
            echo "Your message has been sent.<br>";
        } else {
            echo "Error while sending the message.<br>" . $conn->error;
        }  
    } else {
        echo '<span style="color:red">Empty text - no message sent.</span>';
    }
}  else {
    $userId = $_GET['userId'];
} 



if( $_SESSION['userId'] != $userId ) {   
echo '<br>';
echo '<div>';
echo'<form method="post" action="UserTweets.php">';

    echo('<input type="hidden" name="userId" value=' . $userId. '>');

    echo '<textarea name="message" cols="50" rows="4">Insert your message</textarea><br>';
    echo '<button type="submit" name="submit" value="new_message">Send message to user</button><br><br>';

echo '</form>';
echo '</div>';
}


$userTweets = Tweet::loadAllTweetsByUserId($conn, $userId);

echo '<div>';
echo'<table border = 1>';
echo '<tr><th>User</th><th>Tweet</th><th>Date added</th>';

foreach ($userTweets as $tweet) {
echo '<tr>';
echo '<td><a href=UserTweets.php?userId=' . $tweet->getUserId() . '>' . $tweet->getUsername() . '</a></td>';
echo '<td>' . $tweet->getText() .' <a href=PageComment.php?tweetId=' . $tweet->getId() . '>>><a\></td>';
echo '<td>' . $tweet->getCreationDate() . '</td>';
echo '</tr>';
}
echo'</table>';
echo '</div>';

$conn->close();
$conn = null;
?>
</body>
</html>
