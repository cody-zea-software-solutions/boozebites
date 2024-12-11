<?php
session_start();
if (isset($_SESSION["user_boost"])) {
    $logout_data = [
        "email" => $_SESSION["user_boost"]["email"],
        "logout_time" => date("Y-m-d H:i:s"),
        "ip_address" => $_SESSION["user_boost"]["ip_address"],
        "user_agent" => $_SESSION["user_boost"]["user_agent"],
    ];
    logUserActivity($logout_data);
}

session_unset();
session_destroy();

http_response_code(200); 

function logUserActivity($data) {
    $logFile = 'logout_log.txt';
    $logEntry = json_encode($data) . PHP_EOL;
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
