<?php
include("../authentications.php");
class User
{
    public $userId;
    public $fullName;
    public $username;
    public $email;
    public $mobileNumber;
    public $type;
    public $displayPicture;
    public $password;
    public $dateRegistered;
    public $dateUpdated;

    public function GetUsers()
    {
        try {
            $conn = Config::GetConnection();
            $query = "SELECT * FROM `users`";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $users = array();
            foreach ($results as $item) {
                // echo $item['fullName'];
                $user = new User();
                $user->userId = $item['userId'];
                $user->fullName = $item['fullName'];
                $user->username = $item['username'];
                $user->email = $item['email'];
                $user->mobileNumber = $item['mobileNumber'];
                $user->type = $item['type'];
                $user->displayPicture = $item['displayPicture'];
                $user->password = $item['password'];
                $user->dateRegistered = $item['dateRegistered'];
                $user->dateUpdated = $item['dateUpdated'];
                array_push($users, $user);
            }
            return $users;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Delete()
    {
        try {
            $conn = Config::GetConnection();
            $query = "DELETE FROM users WHERE userId=?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->userId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function Update()
    {
        try {
            // $conn = new Config(); // if the function is only "public function" we need to create an object
            // $conn->GetConnection() // and use the object with an arrow.

            $conn = Config::GetConnection(); // if it is "public static function" you can use it with directly with two colons
            $query = "UPDATE `users` set  `fullName`=?, `username`=?, `email`=?, `mobileNumber`=?, `type`=?, `displayPicture`=?, `password`=? where userId= ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->fullName, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->username, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->mobileNumber, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->type, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->displayPicture, PDO::PARAM_STR);
            $stmt->bindParam(7, $this->password, PDO::PARAM_STR);
            $stmt->bindParam(8, $this->userId, PDO::PARAM_INT);
            $stmt->execute();
            header("location:manageUsers.php");
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function GetUser()
    {
        try {
            $conn = Config::GetConnection();
            $query = "SELECT * FROM `users` WHERE userId=?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->userId, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $user = new User();
            foreach ($results as $item) {
                // echo $item['fullName'];
                $user->userId = $item['userId'];
                $user->fullName = $item['fullName'];
                $user->username = $item['username'];
                $user->email = $item['email'];
                $user->mobileNumber = $item['mobileNumber'];
                $user->type = $item['type'];
                $user->displayPicture = $item['displayPicture'];
                $user->password = $item['password'];
                $user->dateRegistered = $item['dateRegistered'];
                $user->dateUpdated = $item['dateUpdated'];
            }
            return $user;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
