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
require_once 'Messages.php';
require_once 'User.php';
require_once 'misc.php';

if (isset($_SESSION['userId'])) {
    $activeUser = User::loadUserById($conn, $_SESSION['userId']);
    printHeaderLoggedUser('Message', $activeUser->getUsername());
} else {
    printHeaderNotLoggedUser('Message');
    die('No logged user');
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $messageId = $_GET['messageId'];
    $loadMessage = Messages::loadMessageById($conn, $messageId);

    if ($_SESSION['userId'] != $loadMessage->getRecipientUserId()) {
        // wiadomosc wyslana przez zalogowanego uzytkownika - nie updateujemy isRead
        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>Recipient</th><th>Message</th><th>Date</th>';
        echo '<tr>';
        echo '<td>' . $loadMessage->getRecipientUsername() . '</td>';
        echo '<td>' . $loadMessage->getText() . '</td>';
        echo '<td>' . $loadMessage->getCreationDate() . '</td>';
        echo '</tr>';
        echo'</table>';
        echo '</div>';
    } else {
        // czytanie wiadomosci odebranych przez zalogowanego usera
        // jesli nie przeczytana to zapisuje istniejaca wiadomosc, czyli ustawia ja jako przeczytana       
        if ($loadMessage->getIsRead() == 0) {
            $result = $loadMessage->saveToDB($conn);
        }       

        // wyswietlenie wiadomosci
        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>Sender</th><th>Message</th><th>Date</th>';
        echo '<tr>';
        echo '<td>' . $loadMessage->getSenderUsername() . '</td>';
        echo '<td>' . $loadMessage->getText() . '</td>';
        echo '<td>' . $loadMessage->getCreationDate() . '</td>';
        echo '</tr>';
        echo'</table>';
        echo '</div>';
    }
}

$conn->close();
$conn=null;

?>