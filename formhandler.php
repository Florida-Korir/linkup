<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
     require_once 'database.php';
     $Query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
     $stmt = mysqli_prepare($conn, $Query);
     mysqli_stmt_bind_param($stmt, "sss", $username, $passwordHash, $email);
     mysqli_stmt_execute($stmt);
     header("Location: linkup.php");
     mysqli_stmt_close($stmt);
    }
catch(mysqli_sql_exception)
    {
    echo "Connection failed: ";
    }

} else {
    header("Location: index.php");
    exit();
}