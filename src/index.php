<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitter</title>
    </head>
    <body>
        <img src ="ptak.jpg" height="60" width="60">Twitter v.1.0 by Monika Serafinska<br>
        <a href="PageLogout.php">Logout</a><br>

        <?php
        session_start();
        require_once 'connection.php';
        require_once 'User.php';
        require_once 'Tweet.php';
        
        if (isset($_SESSION['userId'])) {
            $activeUser = User::loadUserById($conn, $_SESSION['userId']);
            echo ('Logged user: ' . $activeUser->getUsername() . '<br>');
        } else {
            die('No logged user');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['tweet'])>0) {
                
                $tweet = $_POST['tweet'];
                
                $newTweet = new Tweet();
                $newTweet->setUserId($_SESSION['userId']);
                $newTweet->setText($tweet);
                $newTweet->setCreationDate(date('Y-m-d H:i:s'));
                
                if($newTweet->saveToDB($conn)) {
                    echo "Your tweet has been added.<br>";
                } else {
                    echo "Error while adding new tweet.<br>" . $conn->error;
                }  
            } else {
                echo '<span style="color:red">Empty text - no tweet added.</span>';
            }
        }   
?>

        
        
    <br>
    <div>
        <form method="post" action="index.php">
            <textarea name="tweet" cols="50" rows="4">Insert your tweet</textarea><br>
            <button type="submit" name="submit" value="new_tweet">Add tweet</button><br><br>
        </form>
    </div>

<?php

$loadAllTweets = Tweet::loadAllTweets($conn);

echo '<div>';
echo'<table border = 1>';
echo '<tr><th>User</th><th>Tweet</th><th>Date added</th>';

foreach ($loadAllTweets as $tweet) {
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
