<!DOCTYPE html>
<html>
<head>
    <title>Account Registration</title>
</head>
<body>
    <h2>Account Registration</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>

<?php    
    include("connectDatabase.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];


    $errors = [];
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
}

    if (empty($errors)) {
        $sql = "INSERT INTO tblaccounts (userName, userPassword, userEmail) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashedPassword, $email);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute();
        echo "Registration successful!";

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
    mysqli_close($conn);
?>
