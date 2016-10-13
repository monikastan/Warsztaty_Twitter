<?php

/*
 * Class User:
 */
class User {

    private $id;
    private $username;
    private $hashedPassword;
    private $email;

    //User constructor

    public function __construct() {

        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $this->hashedPassword = "";
    }

    /*
     * 
     * Set and Get methods:
     */
    public function setUsername($newName) {
        $this->username = $newName;
    }

    public function setPassword($newPassword) {
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $this->hashedPassword = $newHashedPassword;
    }

    public function setEmail($newEmail) {
        $this->email = $newEmail;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getHashedPassword() {
        return $this->hashedPassword;
    }

    public function getEmail() {
        return $this->email;
    }

    /**
     * 

      Saving new user to DB
     * 
     */
    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {

            $sql = "INSERT INTO Users(username, email, hashed_password)
                  VALUES ('$this->username', '$this->email', '$this->hashedPassword')";
            $result = $connection->query($sql);

            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } 
        } else {
            $sql = "UPDATE Users SET username='$this->username', email='$this->email',
                    hashed_password='$this->hashedPassword' WHERE id=$this->id";
            $result = $connection->query($sql);
            if ($result == true) {
                return true;
            }
        }
        return false;
    }
       
    
    /**
     * 
     * @param mysqli $connection
     * @param type $id
     * @return \User
     */
    static public function loadUserById(mysqli $connection, $id) {

        $sql = "SELECT * FROM Users WHERE id=$id";

        $result = $connection->query($sql);

        if ($result == true && $result->num_rows == 1) {

            $row = $result->fetch_assoc();

            $loadedUser = new User();

            $loadedUser->id = $row['id'];

            $loadedUser->username = $row['username'];

            $loadedUser->hashedPassword = $row['hashed_password'];

            $loadedUser->email = $row['email'];

            return $loadedUser;
        }

        return null;
    }
    
    
    static public function loadAllUsers(mysqli $connection) {

        $sql = "SELECT * FROM Users";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->hashedPassword = $row['hashed_password'];
                $loadedUser->email = $row['email'];
                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }
    
    
    static public function checkUserPasswordGetId(mysqli $connection, $email,$pass) {
        
        $query = "SELECT * FROM Users WHERE email = '$email'";
        $result = $connection->query($query);

        if ($result == TRUE && $result->num_rows == 1) {
                
            $row = $result->fetch_assoc();
            $hashed_password = $row['hashed_password'];

            if (password_verify($pass, $hashed_password)) {
                $id = $row['id'];
                return $id;
            } 
        }
        return -1;
    }

    

    public function delete(mysqli $connection) {
        if ($this->id != -1) {
            $sql = "DELETE FROM Users WHERE id=$this->id";
            $result = $connection->query($sql);
            if ($result == true) {
                $this->id = -1; //usunelismy obiekt z bazy
                return true;
            }
            return false;
        }
        return true;
    }

}
    
//CRUD - create, read, update, delete