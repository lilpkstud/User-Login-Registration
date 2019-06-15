<?php
require($_SERVER['DOCUMENT_ROOT'].'/models/connection.php');

if(isset($_POST['Login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        header("Location: ../views/account/login.php?error=empty&uname=".$username);
        exit();
    }else{
        
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../views/account/login.php?error=sqlerror&uname=".$username);
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false){
                    header("Location: ../views/account/login.php?error=wrongAccount&uname=".$username);
                    exit();
                }else if($passwordCheck == true){
                    $_SESSION['user'] = $row;
                    header("Location: /");
                    exit();
                }else{
                    header("Location: ../views/account/login.php?error=wrongAccount&uname=".$username);
                    exit();
                }
            }else{
                header("Location: ../views/account/login.php?error=noaccount&uname=".$username);
                exit();
            }
        }
    }
}
if(isset($_POST['createUser'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype = $_POST['retype_password'];
    
    /**
     * User Registration Validation
     */
    if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($retype)){
        header("Location: ../views/account/register.php?error=empty&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../views/account/register.php?error=emailUser&first=".$first_name."&last=".$last_name);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../views/account/register.php?error=email&first=".$first_name."&last=".$last_name."&uname=".$username);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../views/account/register.php?error=username&first=".$first_name."&last=".$last_name."&email=".$email);
        exit();
    }else if(strlen($password) < 8 || strlen($password) >= 20){
        header("Location: ../views/account/register.php?error=password&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
        exit();
    }else if($password !== $retype){
        header("Location: ../views/account/register.php?error=password&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
        exit();
    }else{
        $sql = "SELECT email FROM users WHERE users.email = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../views/account/register.php?error=sqlerror&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $duplicateCheck = mysqli_stmt_num_rows($stmt);
            if($duplicateCheck > 0){
                header("Location: ../views/account/register.php?error=deuplicate&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
                exit();
            } else {
                $sql = "INSERT INTO users (first_name, last_name, username, email, password, CREATED_AT, UPDATED_AT ) VALUES (?,?,?,?,?, NOW(), NOW())";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../views/account/register.php?error=sqlerror&first=".$first_name."&last=".$last_name."&uname=".$username."&email=".$email);
                    exit();
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $username, $email, $hash);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../views/account/register.php?success=yes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} 
if(isset($_GET['logout'])){
    session_unset($_SESSION['user']);
    session_destroy();
    header("Location: /");
    exit();
}
else {
    header("Location: /");
    exit();
}

