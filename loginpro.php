<?php
session_start();
class main {
    public $email;
    public $password;

    public function __construct() {
        $this->email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
        $this->password = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    }
    public function main(){
       $x = $this->submain();
       if($x == "true"){
          $instance = new check($this->email, $this->password);
          return $instance->check();
       }else{
        return $x;
       }
    }

    public function submain() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($this->email)) {
                return "Please enter your email.";
            }
            if(strlen($this->email) > 101){
               return "email is too long";
            }
            if(strlen($this->password)>16){
               return "password is too long";
            }
            if (empty($this->password)) {
                return "Please enter your password.";
            }
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format.";
            }
            return "true";
        } else {
            return "Invalid request method.";
        }
    }
}
class check extends main {
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }
    public function check(): string {
        require_once "connection.php";
        Database::setUpConnection();
        $stmt = Database::$connection->prepare(
            "SELECT * FROM `user` WHERE `email` = ? AND `password` = ?"
        );
        if ($stmt) {
            $stmt->bind_param("ss", $this->email, $this->password);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (($this->password == $user['password'])) {
                    $_SESSION["user_boost"] = array(
                        "email" => $this->email,
                        "login_time" => date("Y-m-d H:i:s"), 
                        "ip_address" => $_SERVER['REMOTE_ADDR'], 
                        "user_agent" => $_SERVER['HTTP_USER_AGENT'], 
                    );                    
                    return $user['first_name'] . " login success!";
                }else{
                    return "session errore.";
                }
            } else {
                return "Invalid email or password.";
            }
            $stmt->close();
        } else {
            return "Error preparing statement: " . Database::$connection->error;
        }
    }


}
$instance = new main();
$result = $instance->main();
echo $result;
?>
