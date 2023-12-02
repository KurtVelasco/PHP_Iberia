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
                        $error = "Account Created";
                    } else {
                        $error = "Username or email already exists";
                    }
                }
            } else {
                $error = "Password does not match same";
            }
        }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="accountCreation.css"/>
    <link rel="stylesheet" type="text/css" href ="test.css"/>
    <link rel="stylesheet" type="text/css" href ="login.css"/>
</head>
<body>
<div class="meme">
<img class ="specter" src="https://webusstatic.yo-star.com/ark_us_web/assets/166859053424210735/240e6cc28639286399279a65a8fca6f1.png"> 
    <div class="createAccount">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">     
            <div class="topbar-logo">
                    <img alt="logo" src="https://raw.githubusercontent.com/Aceship/Arknight-Images/main/factions/logo_iberia.png">
                <div>
                    <span>IBERIA</span>
                </div>        
            </div>
            <span for="error" id="errorLabel"><?php echo $error; ?></span>
            <label for="username">Username:</label>
            <input type="text" name="username" autocomplete="off" placeholder="Enter Username." required>
            <label for="password">Password:</label>
            <input type="password" name="password" autocomplete="off" placeholder="Enter Password." required>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" autocomplete="off" placeholder="Confirm password." required>
            <label for="email">Email:</label>
            <input type="email" name="email" autocomplete="off" placeholder="Enter Email." required>
            <input type="submit" value="Register">  
                <div class="trademark">
                    <span>Status : <?php echo $message; ?> </span>
                </div>
        </form>
    </div>
</div>
        
    <nav class="sidebar-container">
            <ul class="sidebar-list">    
                <li class="sidebar-logo">                     
                    <a href="#" class="sidebar-link logo">  
                        <span>RHINE</span> 
                        <svg viewBox="0 0 24 24" fill="white" height="2.9rem" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>github</title> <rect width="24" height="24" fill="none"></rect> <path d="M12,2A10,10,0,0,0,8.84,21.5c.5.08.66-.23.66-.5V19.31C6.73,19.91,6.14,18,6.14,18A2.69,2.69,0,0,0,5,16.5c-.91-.62.07-.6.07-.6a2.1,2.1,0,0,1,1.53,1,2.15,2.15,0,0,0,2.91.83,2.16,2.16,0,0,1,.63-1.34C8,16.17,5.62,15.31,5.62,11.5a3.87,3.87,0,0,1,1-2.71,3.58,3.58,0,0,1,.1-2.64s.84-.27,2.75,1a9.63,9.63,0,0,1,5,0c1.91-1.29,2.75-1,2.75-1a3.58,3.58,0,0,1,.1,2.64,3.87,3.87,0,0,1,1,2.71c0,3.82-2.34,4.66-4.57,4.91a2.39,2.39,0,0,1,.69,1.85V21c0,.27.16.59.67.5A10,10,0,0,0,12,2Z"></path> </g></svg>        
                    </a>        
                </li>  
                <li class="sidebar-items">
                    <a href="index.php" class="sidebar-link">
                        <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26.676 26.676" xml:space="preserve" stroke="#ffffff" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59 c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815 C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029 c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562 C26.18,21.891,26.141,21.891,26.105,21.891z"></path> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg>
                        <span class="link-text">Return</span>   
                    </a>        
                </li>                
                          
            </ul> 
        </nav>
</body>
</html>