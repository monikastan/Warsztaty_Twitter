<?php


/*
 * Class Messages:
 */
class Messages {

    private $id;
    private $senderUserId;
    private $recipientUserId;
    private $text;
    private $is_read;
    private $creationDate;
    
    //Messages constructor

    public function __construct() {

        $this->id = -1;
        $this->senderUserId = "";
        $this->recipientUserId = "";
        $this->text = "";
        $this->is_read = 0;
        $this->creationDate = "";
    }
    /* 
     * Set and Get methods:
     */
    public function setSenderUserId($newSenderUserId) {
        $this->senderUserId = $newSenderUserId;
    }
    
    public function setRecipientUserId($newRecipientUserId) {
        $this->recipientUserId = $newRecipientUserId;
    }

    public function setText($newText) {
        $this->text = $newText;
    }
    
    public function setIs_Read($newIsRead) {
        $this->is_read = $newIsRead;
    }

    public function setCreationDate($newDate) {
        $this->creationDate = $newDate;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getSenderUserId() {
        return $this->senderUserId;
    }
    
    public function getRecipientUserId() {
        return $this->recipientUserId;
    }
    
    public function getText() {
        return $this->text;
    }
    
    public function getIs_Read() {
        return $this->is_read;
    }
    
    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function getUsername() {
        return $this->username;
    }  
    
    
    static public function loadMessageById(mysqli $connection, $id) {

        $sql = "SELECT * FROM Messages WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {

            $row = $result->fetch_assoc();
            $loadedMessages = new Messages();
            $loadedMessages->id = $row['id'];
            $loadedMessages->senderUserId = $row['senderUserId'];
            $loadedMessages->recipientUserId = $row['recipientUserId'];
            $loadedMessages->text= $row['text'];
            $loadedMessages->is_read= $row['is_read'];
            $loadedMessages->creationDate= $row['creationDate'];

            return $loadedMessages;
        }

        return null;
    }
    
    /*
    static public function loadAllCommentsByTweetId(mysqli $connection, $tweetId) {

        $sql = "SELECT Comment.*, Users.username FROM Comment JOIN Users ON Comment.userId=Users.id WHERE tweetId=$tweetId";
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
    */
    
    /*
      Saving new comment to DB
     * 
     */
    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {

            $sql = "INSERT INTO Messages (senderUserId, recipientUserId, is_read, text, creationDate)
                  VALUES ('$this->senderUserId','$this->recipientUserId', '$this->is_read', '$this->text', '$this->creationDate')";
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
