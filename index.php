<?php
 include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP</title>
    <link rel="stylesheet" href="style.css">
</head>                                                   
<body>
    <div class="container">
        <h1>Sign up Form</h1>
        <form action="includes/formhandler.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <br>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
