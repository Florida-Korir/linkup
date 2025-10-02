<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    require_once '../database.php';     
    require_once 'functions.php';

    if(emptyInputSignup($username, $email, $password, $passwordrepeat) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(invalidusername($username) !== false) {
        header("location: ../index.php?error=emptyusername");
        exit();
    }
    if(invalidemail($email) !== false) {
        header("location: ../index.php?error=emptyemail");
        exit();
    }
     if(passwordLength($password) !== false) {
        header("location: ../index.php?error=passwordtooshort");
        exit();
    }
    if(passwordMatch($password, $passwordrepeat) !== false) {
        header("location: ../index.php?error=passwordsdontmatch");
        exit();
    }
     if(userExist($conn, $username, $email) !== false) {
        header("location: ../index.php?error=usernameexists");
        exit();
    }
                                    
    try {
    //  require_once '../database.php';
     $Query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
     $stmt = mysqli_prepare($conn, $Query);
     mysqli_stmt_bind_param($stmt, "sss", $username, $passwordHash, $email);

    $response = mysqli_stmt_execute($stmt);
     if($response){
        session_start();
        $_SESSION['username'] = $username;
     }
     mysqli_stmt_close($stmt);
     header("Location: ../registration/login/login.php");
    }
    catch(mysqli_sql_exception $e)
    {
        echo "Error: " . $e->getMessage();
    }

} 
else 
{
    echo "Invalid request method.";
    header("Location: ../index.php");
    exit();
}