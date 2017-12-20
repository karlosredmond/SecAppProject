<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="styles/bootstrap.min.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">The username "'.filter_input(INPUT_GET, 'error', $filter = FILTER_SANITIZE_STRING).'" and password combination cannot be authenticated.</p>';
        }

        if($error){
            echo $error;
        }

        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">
          <fieldset>
            <legend>Please Login</legend>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="button" class="btn btn-primary" onclick="formhash(this.form, this.form.password);" >Login</button>
          </fieldset>
        </form>                      
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>      
    </body>
</html>