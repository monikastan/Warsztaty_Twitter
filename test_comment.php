<?php

require_once 'connection.php';
require_once 'Tweet.php';
require_once 'Comment.php';
/*
$loadComment = Tweet::loadTweetById($conn, 1);
var_dump($loadTweet);

$loadTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, 12);
var_dump($loadTweetsByUserId);

$loadAllTweets = Tweet::loadAllTweets($conn);
//var_dump($loadAllTweets);
*/
 //tworze nowego Tweeta:
 

$comment = new Comment();
$comment->setUserId(12);
$comment->setTweetId(2);
$comment->setText('to jest moj komentarz');
$comment->setCreationDate(date('Y-m-d H:i:s'));
$comment->saveToDB($conn);

/*
foreach($loadAllTweets as $tweet) {
    
    echo 'Uzytkownik: ' . $tweet->getUserId() . '<br>';
    echo 'Tresc: '. $tweet->getText() . '<br>';
    echo 'Data utworzenia: ' . $tweet->getCreationDate() . '<br><hr/>';
}

*/