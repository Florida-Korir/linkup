<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">                        
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LINKUP</title>
    <link rel="stylesheet" href="style.css">                    
</head>                     
<body>
    <div class="container">
        <p>Hi <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html> 