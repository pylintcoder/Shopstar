<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeform = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ?  "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeform) {
    return $formName === $activeform ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        height: 100vh;
        width: 100%;
        background: lightblue;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .middle {
        height: 21.5rem;
        width: 25rem;
        background: white;
        color: black;
        border-radius: 5px;
    }

    .behind{
        transition: all 5s ease;
    }

    .infront{
        transition: all 5s ease;
    }

    .middle h1 {
        text-align: center;
    }

    .design {
        border: none;
        background: gray;
        width: 70%;
        padding: 1rem;
        margin-left: 2rem;
        margin-bottom: 1rem;
    }

    .design::placeholder {
        color: red;
    }

    button {
        margin-top: 1rem;
        border: none;
        width: 50%;
        padding: 0.5rem;
        background: blue;
        color: white;
        margin-left: 5rem;
    }

    p {
        text-align: center;
    }

    .behind {
        display: none;
    }

    .error-message{
        padding: 12px;
        background: #f8d7da;
        border-radius: 8px;
        font-size: 16px;
        color: #a4283848;
        text-align: center;
        margin-bottom: 20px;
    }
</style>

<body>
    <div class="infront">
        <div class="middle <?= isActiveForm('login', $activeform);?>">
            <form action="login.php" method="post">
                <h1>LOGIN</h1>
                <?= showError($errors['login']); ?>
                <input class="design" name="email" type="email" placeholder="Enter Your Email"><br>
                <input class="design" name="password" type="password" placeholder="Password"><br>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" class="register">Register</a> </p>
            </form>
        </div>
    </div>
    <div class="behind">
        <div class="middle <?= isActiveForm('register', $activeform);?>">
            <form action="login.php" method="post">
                <h1>REGISTER</h1>
                <?= showError($errors['register']); ?>
                <input class="design" name="email" type="email" placeholder="Enter Your Email"><br>
                <input class="design" name="password" type="password" placeholder="Password"><br>
                <input class="design" name="name" type="text" placeholder="Name"><br>
                <button type="submit" name="register">Register</button>
                <p>Alredy have an account? <a href="#" class="login">Login</a> </p>
            </form>
        </div>
    </div>

    <script>
        const register = document.querySelector(".register");
        const infront = document.querySelector(".infront");
        const behind = document.querySelector(".behind");
        const login = document.querySelector(".login");

        register.addEventListener('click', () => {
            infront.style.display = "none";
            behind.style.display = "block";
        })

        login.addEventListener('click', () => {
            behind.style.display = "none";
            infront.style.display = "block";
        })
    </script>
</body>

</html>