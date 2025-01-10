<?php
include("../config/config.php");

class Food
{
    public $foodId;
    public $foodName;
    public $foodPrice;
    public $foodCategory;
    public $offerAvailable;
    public $foodDescription;
    public $foodImage;
    public $dateAdded;
    public $dateUpdated;

    public function GetFoods()
    {
        try {
            $conn = Config::GetConnection();
            $query = "SELECT * FROM `food`";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $foods = array();
            foreach ($results as $item) {
                // echo $item['fullName'];
                $food = new Food();
                $food->foodId = $item['foodId'];
                $food->foodName = $item['foodName'];
                $food->foodPrice = $item['foodPrice'];
                $food->foodCategory = $item['foodCategory'];
                $food->offerAvailable = $item['offerAvailable'];
                $food->foodDescription = $item['foodDescription'];
                $food->foodImage = $item['foodImage'];
                $food->dateAdded = $item['dateAdded'];
                $food->dateUpdated = $item['dateUpdated'];
                array_push($foods, $food);
            }
            return $foods;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function GetFood()
    {
        try {
            $conn = Config::GetConnection();
            $query = "SELECT * FROM `food` where foodId=?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->foodId, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
            $food = new Food();
            foreach ($results as $item) {
                // echo $item['fullName'];
                $food = new Food();
                $food->foodId = $item['foodId'];
                $food->foodName = $item['foodName'];
                $food->foodPrice = $item['foodPrice'];
                $food->foodCategory = $item['foodCategory'];
                $food->offerAvailable = $item['offerAvailable'];
                $food->foodDescription = $item['foodDescription'];
                $food->foodImage = $item['foodImage'];
                $food->dateAdded = $item['dateAdded'];
                $food->dateUpdated = $item['dateUpdated'];
            }
            return $food;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function AddFood()
    {
        try {
            $conn = Config::GetConnection();
            $query = "INSERT INTO `food` 
            (`foodName`, `foodPrice`, `foodCategory`, `offerAvailable`, `foodDescription`, `foodImage` ) 
            VALUES (?, ?, ?, ?, ?, ?) ";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->foodName, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->foodPrice, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->foodCategory, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->offerAvailable, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->foodDescription, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->foodImage, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function DeleteFood()
    {
        try {
            $conn = Config::GetConnection();
            $query = "DELETE FROM food WHERE foodId=?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->foodId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function UpdateFood()
    {
        try {
            // $conn = new Config(); // if the function is only "public function" we need to create an object
            // $conn->GetConnection() // and use the object with an arrow.

            $conn = Config::GetConnection(); // if it is "public static function" you can use it with directly with two colons
            $query = "UPDATE `food` set  `foodName`=?, `foodPrice`=?, `foodCategory`=?, `offerAvailable`=?, `foodDescription`=?, `foodDescription`=?, `foodImage`=? where foodId= ?";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $this->foodName, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->foodPrice, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->foodCategory, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->offerAvailable, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->foodDescription, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->foodDescription, PDO::PARAM_STR);
            $stmt->bindParam(7, $this->foodImage, PDO::PARAM_STR);
            $stmt->bindParam(8, $this->foodId, PDO::PARAM_INT);
            $stmt->execute();
            header("location:manageFood.php");
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
