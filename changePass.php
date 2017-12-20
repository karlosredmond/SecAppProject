<?php
include_once 'includes/changePass.inc.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/bootstrap.min.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="page1.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="changePass.php">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="includes/logout.php">Logout</a>
              </li>
            </ul>
            <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                method="post" 
                name="registration_form">
            New Password: <input type="password" name="password" id="password"/><br>
            Confirm New password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
                                     <input type="hidden" name="username" id="username" value = <?php echo $_SESSION['username']; ?> /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return passformhash(this.form,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>

        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>