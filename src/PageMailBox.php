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
require_once 'Messages.php';
require_once 'misc.php';

if (isset($_SESSION['userId'])) {
    $activeUser = User::loadUserById($conn, $_SESSION['userId']);
    printHeaderLoggedUser('Messages Sent and Received', $activeUser->getUsername());
} else {
//wypisz naglowek dla niezalogowanego usera(pageName);

    printHeaderNotLoggedUser('Messages Sent and Received');
    echo '<br>No logged user. Go to <a href="PageLogin.php">login page.</a><br><br>';
    die('');
}

$loadedRecipientMessages = Messages::getMessagesByRecipientUserId($conn, $_SESSION['userId']);

echo '<div>';
echo'<table border = 1>';
echo '<font size="6">Received messages:</font>';
echo '<tr><th>Sender</th><th>Message</th><th>Date</th>';

foreach ($loadedRecipientMessages as $message) {
    if ($message->getIsRead() == 0) {
        echo '<tr bgcolor="#ccccff">';
    } else {
        echo '<tr>';
    }
    echo '<td>' . $message->getSenderUsername() . '</td>';
    echo '<td><a href=PageMessage.php?messageId=' . $message->getId() . '>' . substr($message->getText(), 0, 30) . '</a></td>';
    echo '<td>' . $message->getCreationDate() . '</td>';
    echo '</tr>';
}
echo'</table>';
echo '</div>';


$loadedSenderMessages = Messages::getMessagesBySenderUserId($conn, $_SESSION['userId']);

echo '<div>';
echo'<table border = 1>';
echo '<font size="6">Sent messages:</font>';
echo '<tr><th>Recipient</th><th>Message</th><th>Date</th>';

foreach ($loadedSenderMessages as $message) {
    echo '<tr>';
    echo '<td>' . $message->getRecipientUsername() . '</td>';
    echo '<td><a href=PageMessage.php?messageId=' . $message->getId() . '>' . substr($message->getText(), 0, 30) . '</a></td>';
    echo '<td>' . $message->getCreationDate() . '</td>';
    echo '</tr>';
}



$conn->close();
$conn = null;
?>

    </body>
</html>

