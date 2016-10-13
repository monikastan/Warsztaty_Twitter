<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitter</title>
    </head>
    <body>
        <a href="index.php"><img src ="ptak.jpg" height="60" width="60" title="Twitter"></a>Twitter v.1.0 by Monika Serafinska<br>
        <a href="PageLogout.php">Logout</a><br>

        <?php
        session_start();
        require_once 'connection.php';
        require_once 'User.php';
        require_once 'Tweet.php';
        require_once 'Comment.php';

        if (isset($_SESSION['userId'])) {
            $activeUser = User::loadUserById($conn, $_SESSION['userId']);
            echo ('Logged user: ' . $activeUser->getUsername() . '<br>');
        } else {
            die('No logged user');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tweetId = $_POST['tweetId'];

            if (isset($_POST['comment']) > 0) {

                $newComment = new Comment();
                $newComment->setUserId($_SESSION['userId']);
                $newComment->setTweetId($tweetId);
                $newComment->setText($_POST['comment']);
                $newComment->setCreationDate(date('Y-m-d H:i:s'));

                if ($newComment->saveToDB($conn)) {
                    echo "Your comment has been added.<br>";
                } else {
                    echo "Error while adding new comment.<br>" . $conn->error;
                }
            } else {
                echo '<span style="color:red">Empty text - no comment added.</span>';
            }
        } else {
            $tweetId = $_GET['tweetId'];
        }

        $loadTweet = Tweet::loadTweetById($conn, $tweetId);
        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>User</th><th>Tweet</th><th>Date added</th>';
        echo '<tr>';
        echo '<td><a href=UserTweets.php?userId=' . $loadTweet->getUserId() . '>' . $loadTweet->getUsername() . '</a></td>';
        echo '<td>' . $loadTweet->getText() . ' <a href=PageComment.php?tweetId=' . $loadTweet->getId() . '>>><a\></td>';
        echo '<td>' . $loadTweet->getCreationDate() . '</td>';
        echo '</tr>';
        echo'</table>';
        echo '</div>';
        ?>



        <br>
        <div>
            <form method="post" action="PageComment.php">
                <?php
                echo('<input type="hidden" name="tweetId" value="' . $tweetId . '">');
                ?>
                <textarea name="comment" cols="50" rows="4">Insert your comment</textarea><br>
                <button type="submit" name="submit" value="new_comment">Add comment</button><br><br>
            </form>
        </div>

        <?php
        $loadAllComments = Comment::loadAllCommentsByTweetId($conn, $tweetId);

        echo '<div>';
        echo'<table border = 1>';
        echo '<tr><th>User</th><th>Comments</th><th>Date added</th>';

        foreach ($loadAllComments as $comment) {
            echo '<tr>';
            echo '<td><a href=UserTweets.php?userId=' . $comment->getUserId() . '>' . $comment->getUsername() . '</a></td>';
            echo '<td>' . $comment->getText() . '</td>';
            echo '<td>' . $comment->getCreationDate() . '</td>';
            echo '</tr>';
        }
        echo'</table>';
        echo '</div>';

        $conn->close();
        $conn = null;
        ?>
    </body>
</html>
