<?php
require "connect.php";
class main
{
     public $fname;
     public $lname;
     public $email;
     public $password;
     public function getdata()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $this->fname = $_POST['fname'];
               $this->lname = $_POST['lname'];
               $this->email = $_POST['email'];
               $this->password = $_POST['password'];
               if (empty($this->fname)) {
                    return "pleace enter your first name";
               } else if (strlen($this->lname) > 45) {
                    return ("Last name must be 45 characters or less");
               } else if (empty($this->lname)) {
                    return "pleace enter your last name";
               } elseif (strlen($this->lname) > 45) {
                    return ("Last name must be 45 characters or less");
               } else if (empty($this->email)) {
                    return "pleace enter your email";
               } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    return ("Invalid email format");
               } else if (strlen($this->email) > 101) {
                    return ("email is too long");
               } else if (strlen($this->password) > 16) {
                    return ("password is too long");
               } else if (empty($this->password)) {
                    return ("passwod is empty");
               } else if (!$this->validatePassword($this->password)) {
                    return "Password must contain at least one uppercase letter, one lowercase letter, and one number.";
               } else {
                    return "OK";
               }
          } else {
               return "Invalid request method.";
          }
     }
     private function validatePassword($password)
     {
          $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/";
          return preg_match($pattern, $password);
     }
     public function main()
     {
          $y = $this->getdata();
          if ($y == "OK") {
               $m = Database::search("SELECT * FROM `user` WHERE `email`='" . $this->email . "'");
               $mm = $m->num_rows;
               if ($mm == 1) {
                    return "email already rejisterd";
               } else {
                    $c = new sql($this->fname, $this->lname, $this->email, $this->password);
                    $cc = $c->insert();
                    return $cc;
               }
          } else {
               return  $y;
          }
     }
}
class sql
{
     private $fname;
     private $lname;
     private $email;
     private $password;

     public function __construct($fname, $lname, $email, $password)
     {
          $this->fname = $fname;
          $this->lname = $lname;
          $this->email = $email;
          $this->password = $password;
     }
     public function insert()
     {
          #insert
          $d = new DateTime();
          $tz = new DateTimeZone("Asia/Colombo");
          $d->setTimezone($tz);
          $date = $d->format("Y-m-d H:i:s");

          $query = "INSERT INTO `user` 
           (`first_name`, `last_name`, `email`, `password`, `joined_date`, `status`) 
           VALUES (?, ?, ?, ?, ?, ?)";

          Database::setUpConnection();

          $stmt = Database::$connection->prepare($query);
          if ($stmt) {
               $status = 1;

               $stmt->bind_param("sssssi", $this->fname, $this->lname, $this->email, $this->password, $date, $status);
               $result = $stmt->execute();
               if ($result) {
                    return "User inserted successfully.";
               } else {
                    return "Error inserting user: " . $stmt->error;
               }
               $stmt->close();
          } else {
               return "Error preparing statement: " . Database::$connection->error;
          }
          #insert
     }
}
$x = new main();
$xx = $x->main();
echo $xx;
