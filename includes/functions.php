<?php
function emptyInputSignup($username, $email, $password, $passwordrepeat){
    $result;
   if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)){
        $result = true;
   }
   else {
        $result = false;
   }
   return $result;
}

function invalidusername($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;    
    }
    return $result;
}
function invalidemail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;    
    }
    return $result;
}
function passwordLength($passwordLength){
    $result;
    if ($passwordLength < 8) {
        $result = true;
    } else {
        $result = false;    
    }
    return $result;
}
function passwordMatch($password, $passwordrepeat){
    $result;
    if ($password !== $passwordrepeat) {
        $result = true;
    } else {
        $result = false;    
    }
    return $result;
}
function userExist($conn, $username, $email){
   $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
   }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
    return $row;
   }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);

}

function emptyInputLogin($username, $password){
    $result;
   if (empty($username) || empty($password)){
        $result = true;
   }
   else {
        $result = false;
   }
   return $result;
}