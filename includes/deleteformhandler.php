<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to delete your account.";
        header("Location: ../registration/login/login.php");
        exit();
    }

    $username = $_SESSION['username'];

    try {
        require_once '../database.php';

        $query = "DELETE FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // User deleted
            session_unset();
            session_destroy();
            echo "Your account has been deleted successfully.";
            header("Refresh:3; url=../registration/login/login.php"); 
            exit();
        } else {
            echo "Error: Account could not be deleted.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
