<?php


/*
 * Class Comment:
 */
class Comment {

    private $id;
    private $userId;
    private $tweetId;
    private $text;
    private $creationDate;
    


    //Comment constructor

    public function __construct() {

        $this->id = -1;
        $this->userId = "";
        $this->tweetId = "";
        $this->text = "";
        $this->creationDate = "";
    }
    /* 
     * Set and Get methods:
     */
    public function setUserId($newUserId) {
        $this->userId = $newUserId;
    }
    
    public function setTweetId($newTweetId) {
        $this->tweetId = $newTweetId;
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
    
    public function getTweetId() {
        return $this->tweetId;
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
    
    
    static public function loadCommentById(mysqli $connection, $id) {

        $sql = "SELECT * FROM Comment WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $loadedComment = new Comment();
            $loadedComment->id = $row['id'];
            $loadedComment->userId = $row['userId'];
            $loadedComment->tweetId = $row['tweetId'];
            $loadedComment->text= $row['text'];
            $loadedComment->creationDate= $row['creationDate'];

            return $loadedComment;
        }

        return null;
    }
    
    
    static public function loadAllCommentsByTweetId(mysqli $connection, $tweetId) {

        $sql = "SELECT Comment.*, Users.username FROM Comment JOIN Users ON Comment.userId=Users.id WHERE tweetId=$tweetId ORDER BY creationDate DESC";
        $ret = [];
        $result = $connection->query($sql);

        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedComments = new Comment();
                $loadedComments->id = $row['id'];
                $loadedComments->userId = $row['userId'];
                $loadedComments->tweetId = $row['tweetId'];
                $loadedComments->text= $row['text'];
                $loadedComments->creationDate= $row['creationDate'];
                $loadedComments->username= $row['username'];
                $ret[] = $loadedComments;
            }
        }   
        return $ret;
    }
    
    
    /*
      Saving new comment to DB
     * 
     */
    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {

            $sql = "INSERT INTO Comment (userId,tweetId, text, creationDate)
                  VALUES ('$this->userId','$this->tweetId', '$this->text', '$this->creationDate')";
            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } 
        } else {
            $sql = "UPDATE Comment SET text='$this->text',
                    creationDate='$this->creationDate' WHERE id=$this->id";
            $result = $connection->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }
}