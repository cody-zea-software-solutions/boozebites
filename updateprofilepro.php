<?php
include "connection.php";

class Main
{
    public $fname;
    public $lname;
    public $email;
    public $mobile;
    public $city;
    public $addressLine1;
    public $addressLine2;

    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $input = json_decode(file_get_contents("php://input"), true);
            if ($input) {
                $this->fname = $input["fname"] ?? null;
                $this->lname = $input["lname"] ?? null;
                $this->email = $input["email"] ?? null;
                $this->mobile = $input["mobile"] ?? null;
                $this->city = $input["city"] ?? null;
                $this->addressLine1 = $input["addressLine1"] ?? null;
                $this->addressLine2 = $input["addressLine2"] ?? null;
            } else {
                die("Invalid input.");
                exit;
            }
        } else {
            die("Invalid request method.");
            exit;
        }
    }

    public function validateInputs()
    {
        if (empty($this->fname)) {
            return "Please enter your first name.";
        } else if (strlen($this->fname) > 45) {
            return "first name must be 45 characters or less.";
        } else if (empty($this->lname)) {
            return "Please enter your last name.";
        } else if (strlen($this->lname) > 45) {
            return "Last name must be 45 characters or less.";
        } else if (empty($this->email)) {
            return "Please enter your email.";
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        } else if (strlen($this->email) > 100) {
            return "Email must be 100 characters or less.";
        } else if (empty($this->mobile)) {
            return "Please enter your mobile number.";
        } else if (!preg_match('/^\+?\d{10,12}$/', $this->mobile)) {
            return "Mobile number must be 10 to 12 digits, optionally starting with +.";
        } else if (empty($this->addressLine1)) {
            return "Please enter your address line 1.";
        } else if (strlen($this->addressLine1) > 100) {
            return "Address line 1 must be 100 characters or less.";
        } else if (!empty($this->addressLine2) && strlen($this->addressLine2) > 100) {
            return "Address line 2 must be 100 characters or less.";
        } else {
            return null;
        }
    }

    public function main()
    {
        $error = $this->validateInputs();
        if ($error) {
            echo $error;
        } else {
            $insert = new insert();
           echo $mg = $insert->insert($this->fname, $this->lname,$this->email,$this->mobile,$this->addressLine1,$this->addressLine2,$this->city);
        }
    }
}
class insert
{
    public function insert($fname,$lname,$email,$mobile,$addressLine1,$addressLine2,$city): string
    {
    $this->addressInsert($email,$city,$addressLine1,$addressLine2,1);
    Database::IUD("UPDATE `user` 
    SET 
        `first_name` = '" . $fname . "', 
        `last_name` = '" . $lname . "', 
        `mobile` = '" . $mobile . "' 
    WHERE 
        `email` = '" . $email . "'");
        return "profile updated";
    }
    public function addressInsert($email, $city, $addressLine1, $addressLine2) {
        $address = Database::Search("SELECT * FROM `address` WHERE `user_email`='" . $email . "'");
        $addressCount = $address->num_rows;
        if ($addressCount == 0) {  
            Database::IUD("INSERT INTO `address` (`first_line`, `second_line`, `user_email`, `city_id`) 
                VALUES ('" . $addressLine1 . "','" . $addressLine2 . "','" . $email . "','" . $city . "')");
        } else { 
            Database::IUD("UPDATE `address` 
                SET 
                    `first_line` = '" . $addressLine1 . "', 
                    `second_line` = '" . $addressLine2 . "', 
                    `city_id` = '" . $city . "' 
                WHERE 
                    `user_email` = '" . $email . "'");
        }
    }
}
$main = new Main();
$main->main();
?>