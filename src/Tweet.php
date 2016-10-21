<?php


/*
 * Class Tweet:
 */
class Tweet {

    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private $username;
    
    //Tweet constructor

    public function __construct() {

        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
    }
    /* 
     * Set and Get methods:
     */
    public function setUserId($newUserId) {
        $this->userId = $newUserId;
    }
    
    public function setText($newText) {
        $this->text = $newText;
    }

    public function setCreationDate($newDate) {
        $this->creationDate = $newDate;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
          
    public function getText() {
        return $this->text;
    }
    
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    
    static public function loadTweetById(mysqli $connection, $id) {

        $sql = "SELECT t.*, u.username FROM Tweet as t, Users as u WHERE t.userId = u.id AND t.id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['userId'];
            $loadedTweet->text= $row['text'];
            $loadedTweet->creationDate= $row['creationDate'];
            $loadedTweet->username = $row['username'];

            return $loadedTweet;
        }

        return null;
    }
    
    
    static public function loadAllTweetsByUserId(mysqli $connection, $userId) {

        $sql = "SELECT t.*, u.username FROM Tweet as t, Users as u WHERE t.userId = u.id AND userId=$userId";
        $ret = [];
        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweets = new Tweet();
                $loadedTweets->id = $row['id'];
                $loadedTweets->userId = $row['userId'];
                $loadedTweets->text= $row['text'];
                $loadedTweets->creationDate= $row['creationDate'];
                $loadedTweets->username = $row['username'];
                $ret[] = $loadedTweets;
            }
        }   
        return $ret;
    }
    
    
    static public function loadAllTweets(mysqli $connection) {

        $sql = "SELECT t.*, u.username FROM Tweet as t, Users as u WHERE t.userId = u.id ORDER BY creationDate DESC";
        $ret = [];
        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweets = new Tweet();
                $loadedTweets->id = $row['id'];
                $loadedTweets->userId = $row['userId'];
                $loadedTweets->text= $row['text'];
                $loadedTweets->creationDate= $row['creationDate'];
                $loadedTweets->username = $row['username'];
                $ret[] = $loadedTweets;
            }
        }   
        return $ret;
    }
    /*
      Saving new tweet to DB
     * 
     */
    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {

            $sql = "INSERT INTO Tweet (userId, text, creationDate)
                  VALUES ('$this->userId', '$this->text', '$this->creationDate')";
            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } 
        } else {
            $sql = "UPDATE Tweet SET text='$this->text',
                    creationDate='$this->creationDate' WHERE id=$this->id";
            $result = $connection->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }
}