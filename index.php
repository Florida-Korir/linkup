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
        <form action="includes/Signupformhandler.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <br><br>
            <input type="email" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
            <input type="password" name="passwordrepeat" placeholder="Repeat Password">
            <br><br>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET['error'] == "emptyusername") {
        echo "<p>Choose a proper username!</p>";
    }
    else if($_GET['error'] == "emptyemail") {
        echo "<p>Choose a proper email!</p>";
    }
    else if($_GET['error'] == "passwordtooshort") {
        echo "<p>Password should be at least 8 characters!</p>";
    }
    else if($_GET['error'] == "passwordsdontmatch") {
        echo "<p>Passwords don't match!</p>";
    }
    else if($_GET['error'] == "usernameexists") {
        echo "<p>Username or Email already taken!</p>";
    }
    else if($_GET['error'] == "stmtfailed") {
        echo "<p>Something went wrong, try again!</p>";
    }
    else if($_GET['error'] == "none") {
        echo "<p>You have signed up!</p>";
    }
}
?>
    </div>
</body>
</html>
