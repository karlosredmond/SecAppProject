<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
//filter_input ->  Gets a specific external variable by name and optionally filters it
//FILTER_SANITIZE_STRING -> Remove all HTML tags from a string
//INPUT_GET -> Gets variable from outside PHP and optionally filters it

if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
    </body>
</html>