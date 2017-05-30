<?php
session_start();
$message = '';
try{
        $userName = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($userName) || empty($password)) {
            $message = "<p class='error'>Required Parameter is missing</p>";
        } else {
            include "database_access.php";

            if (!$connection) {
                $message = "<p class='error'>Connection Failed.</p>";
            } else {
                $stmt = $connection->prepare('SELECT name, username FROM users WHERE username = :username AND password = :password');
                $stmt->execute(['username' => $userName, 'password' => hash('sha512', $password)]);
                $user = $stmt->fetch();
                if (empty($user)) {
                    $message = "<p class='error'>User Name or Password is incorrect</p>";
                } else {
                    $_SESSION['logged_in'] = $userName;
                    header('Location: welcome.php');
                    exit();
                }
            }
        }
}catch (Exception $e) {
    $message = "<p class='error'>Error : " . $e->getMessage() . "</p>";
}
$_SESSION['login-error'] = $message;
header('Location: login-get.php')
?>