<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
include_once 'includes/headers.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <link rel="stylesheet" href="styles/bootstrap.min.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register with us</h1>
        <?php
        //if there are any error messages, display them
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Password Length (min 8 characters)</li>
            <li>Max Password (not limited)</li>
            <li>Multiple Character Sets (required)</li>                
            <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            <li>Allow any keyboard character</li>
            </li>
            <li>Your password and confirmation must match exactly</li>
            <li>Username must contain only letters, numbers and underscores.</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' name='username' id='username' /><br>
            Password: <input type="password" name="password" id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>