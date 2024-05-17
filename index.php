<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="login_username">Username:</label>
        <input type="text" id="login_username" name="username" required>
        <label for="login_password">Password:</label>
        <input type="password" id="login_password" name="password" required>
        <button type="submit">Login</button>
    </form>

    <h2>Register</h2>
    <form action="register_process.php" method="post">
        <label for="register_username">Username:</label>
        <input type="text" id="register_username" name="username" required>
        <label for="register_password">Password:</label>
        <input type="password" id="register_password" name="password" required>
        <button type="submit">Register</button>

    </form>
</body>
</html>
