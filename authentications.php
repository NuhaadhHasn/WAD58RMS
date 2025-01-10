<?php
include("config/config.php");
class Authentications
{
    public $userId;
    public $fullName;
    public $username;
    public $email;
    public $mobileNumber;
    public $type;
    public $displayPicture;
    public $password;

    public function Login()
    {
        try {
            if ((!empty($_POST['txtAdminUsername']) && !empty($_POST['txtAdminPassword'])) ||
                (!empty($_POST['txtStaffUsername']) && !empty($_POST['txtStaffPassword'])) ||
                (!empty($_POST['txtCustomerUsername']) && !empty($_POST['txtCustomerPassword']))
            ) {
                $conn = Config::GetConnection();
                // $LoginProcess = new LoginProcess();
                $query = "SELECT * FROM `users` WHERE (username=? or email=?) and password=? and type=?; ";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(1, $this->username, PDO::PARAM_STR);
                $stmt->bindParam(2, $this->username, PDO::PARAM_STR);
                $stmt->bindParam(3, $this->password, PDO::PARAM_STR);
                $stmt->bindParam(4, $_SESSION["UserType"], PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchAll();
                $test = $results[0]['type'];
                if (isset($results[0]) && $_SESSION["UserType"] == "ADMIN") {
                    $_SESSION["AdminLogged"] = "Logged";
                    unset($_SESSION["StaffLogged"]);
                    unset($_SESSION["CustomerLogged"]);
                    header("location:admin/index.php");
                } elseif (isset($results[0]) && $_SESSION["UserType"] == "STAFF") {
                    $_SESSION["StaffLogged"] = "Logged";
                    unset($_SESSION["AdminLogged"]);
                    unset($_SESSION["CustomerLogged"]);
                    header("location:staff/index.php");
                } elseif (isset($results[0]) && $results[0]['type'] == "CUSTOMER") {
                    $_SESSION["CustomerLogged"] = "Logged";
                    unset($_SESSION["AdminLogged"]);
                    unset($_SESSION["StaffLogged"]);
                    header("location:index.php");
                } else {
                    echo "<script>alert('Invalid Username or Password')</script>";
                }
            } else {
                echo "<script>alert('Enter Username and Password')</script>";
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function Register()
    {
        try {
            $conn = Config::GetConnection();
            $query = "INSERT INTO `users` 
            (`fullName`, `username`, `email`, `mobileNumber`, `type`, `displayPicture` ,`password`) 
            VALUES (?, ?, ?, ?, ?, ?, ?) ";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->fullName, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->username, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->mobileNumber, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->type, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->displayPicture, PDO::PARAM_STR);
            $stmt->bindParam(7, $this->password, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
