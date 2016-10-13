<?php

require_once 'connection.php';
require_once 'Tweet.php';

$loadTweet = Tweet::loadTweetById($conn, 1);
var_dump($loadTweet);

$loadTweetsByUserId = Tweet::loadAllTweetsByUserId($conn, 12);
var_dump($loadTweetsByUserId);

$loadAllTweets = Tweet::loadAllTweets($conn);
//var_dump($loadAllTweets);

/* tworze nowego Tweeta:
 * 

$tweet = new Tweet();
$tweet->setUserId(19);
$tweet->setText('to jest moj kolejny wpis');
//$tweet->setCreationDate('2016-10-08 23:35:00');
$tweet->setCreationDate(date('Y-m-d H:i:s'));
$tweet->saveToDB($conn);
*/

foreach($loadAllTweets as $tweet) {
    
    echo 'Uzytkownik: ' . $tweet->getUserId() . '<br>';
    echo 'Tresc: '. $tweet->getText() . '<br>';
    echo 'Data utworzenia: ' . $tweet->getCreationDate() . '<br><hr/>';
}

