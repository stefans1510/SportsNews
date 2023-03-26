<form method="post" action="classes/UserController.php">
    <input type="hidden" name="action" value="register">

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br>

    <input type="submit" name="register" value="Register">
</form>