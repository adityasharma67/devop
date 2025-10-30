<!DOCTYPE html>
<html>
<head>
    <title>PHP Form</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <?php
    $username = $email = $password = "";
    $usernameErr = $emailErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } elseif (strlen($_POST["username"]) < 5) {
            $usernameErr = "Username must be at least 5 characters long";
        } else {
            $username = htmlspecialchars($_POST["username"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
        } elseif (!preg_match('/\d/', $_POST["password"])) {
            $passwordErr = "Password must include at least one number";
        } else {
            $password = htmlspecialchars($_POST["password"]);
        }
    }
    ?>

    <h2>PHP Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" value="<?php echo $username; ?>">
        <span class="error"><?php echo $usernameErr; ?></span><br><br>

        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span><br><br>

        Password: <input type="password" name="password">
        <span class="error"><?php echo $passwordErr; ?></span><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
        echo "<h3>Entered Data:</h3>";
        echo "Username: " . $username . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Password: " . $password . "<br>";
    }
    ?>
</body>
</html>
