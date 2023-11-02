<?php
include("connectDatabase.php");
$error = ""; 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($confirmPassword == $password) {
                //Added an if statment since it keeps adding shit with each refres
                //previous statement
                if (!empty($username) && !empty($password) && !empty($email)) {
                    //Check quert first if the username and email is unique 
                    $checkQuery = "SELECT COUNT(*) FROM tblaccounts WHERE userName = '$username' OR userEmail = '$email'";
                    $result = mysqli_query($conn, $checkQuery);
                    $count = mysqli_fetch_row($result)[0];

                    if ($count == 0) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO tblaccounts (userName, userPassword, userEmail)
                            VALUES('$username', '$hash', '$email')";
                        mysqli_query($conn, $sql);
                        echo "Account Created";
                    } else {
                        $error = "Username or email already exists";
                    }
                }
            } else {
                $error = "Password not the same";
            }
        }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="accountCreation.css"/>
</head>
<body>
    <div class="creatAccount">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">      
            <label for="error" id="errorLabel"><?php echo $error; ?></label>
            <label for="username">Username:</label>
            <input type="text" name="username" autocomplete="off" placeholder="Enter Username." required>
            <label for="password">Password:</label>
            <input type="password" name="password" autocomplete="off" placeholder="Enter Password." required>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" autocomplete="off" placeholder="Enter Password." required>
            <label for="email">Email:</label>
            <input type="email" name="email" autocomplete="off" placeholder="Enter Email." required>
            <input type="submit" value="Register">  
        </form>
        <div class="logo">
            <img alt="logo" src="https://raw.githubusercontent.com/Aceship/Arknight-Images/main/factions/logo_iberia.png">
            <div>
                <span>IBERIA</span>
            </div>        
        </div>
    </div>
</body>
</html>