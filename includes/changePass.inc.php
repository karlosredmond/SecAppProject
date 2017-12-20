<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
 
$error_msg = "";

if (isset($_POST['p'])) {
    // Sanitize and validate the data passed in
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

 
    if (empty($error_msg)) {
 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);
 
        // Insert the new user into the database 
        if ($update_stmt = $mysqli->prepare("UPDATE members SET password = ? WHERE username = ?")) {
            $update_stmt->bind_param('ss',$password, $username );
            // Execute the prepared query.
            if (! $update_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: Update');
            }
        }
        sec_session_start();
 
        // Unset all session values 
        $_SESSION = array();
         
        // get session parameters 
        $params = session_get_cookie_params();
         
        // Delete the actual cookie. 
        setcookie(session_name(),
                '', time() - 42000, 
                $params["path"], 
                $params["domain"], 
                $params["secure"], 
                $params["httponly"]);
         
        // Destroy session 
        session_destroy();
        header('Location: ./index.php?err=Password change successful, please login with new password to confirm');
    }
}
?>