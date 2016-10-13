<?php

require_once 'connection.php';
require_once 'User.php';

$user = new User();
$user->setEmail('ala@ala.com');
$user->setPassword('aaa');
$user->setUsername('ala');
$user->saveToDB($conn);


$loadUser = User::loadUserById($conn, 21);

echo $loadUser->getEmail();
echo '<br>';
echo $loadUser->getHashedPassword();
echo '<br>';
echo $loadUser->getUsername();
echo '<br>';

//var_dump($loadUser);
var_dump($loadUser);

/*
  @var User $usr 
*/ 

$loadUsers = User:: loadAllUsers($conn);
//var_dump($loadUsers);


foreach ($loadUsers as $usr) {
    
    echo $usr->getEmail(). '<br>';
    echo $usr->getHashedPassword(). '<br>';
    echo $usr->getUsername(). '<br><hr/>';
   
}


$user2 = User::loadUserById($conn, 17);

$user2->setEmail('zisia@coders.com');

$user2->saveToDB($conn);

echo $user2->getEmail();


//$user2->delete($conn);
