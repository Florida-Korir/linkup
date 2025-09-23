<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        require_once '../database.php';

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        $Query = "SELECT username, password FROM users WHERE username = ? LIMIT 1;";
        $stmt = mysqli_prepare($conn, $Query);

        if (!$stmt) {
            die("Query preparation failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $db_username, $db_passwordHash);

        if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $db_passwordHash)) {
                $_SESSION['username'] = $db_username;
                header("Location: ../../profile.php");
                exit();
            } else {
                echo " Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
