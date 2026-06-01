<?php
session_start();
require_once 'config.php';

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        $stmt->close();
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $insert->bind_param('sss', $name, $email, $hashed);
        $insert->execute();
        $insert->close();
    }

    header("Location: index.php");
    
}
 
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];  

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if ($user['email'] === "lawrence123boye@gmail.com") {
                header("Location: adminpage.php");
            } else {
                header("Location: userpage.php");
            }
            exit();
        }
    }

    $_SESSION['login_error'] = 'Incorrect Email or Password!';
    $_SESSION['active_form'] = 'login!';
    header('Location: index.php');
    exit();
}
?>
