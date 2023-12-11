<?php

require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo 'Please fill in all fields.';
        exit;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Please enter a valid email address.';
        exit;
    } else {
        try {
            $options = [
                'cost' => 12,
            ];

            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $email = $_POST['email'];

            $database = new Database();
            $database->AddUser($username, $password, $email);
            $message = $database->message;
            header('Location: form.php');
        } catch (PDOException $e) {
            $message = "Username or email already exists.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Rigister</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="register">
                    <h2>Register</h2>
                    <?php
                    if (isset($message)) {
                        echo '<p>' . $message . '</p>';
                    }
                    ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>