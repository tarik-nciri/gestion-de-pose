<?php               
 session_start();

if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) {
    header("location: add.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="admin">
        <a href="index.php">Home</a>
    </div>
    <?php
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!empty($username) && !empty($password)) {
            require_once 'config.php';
            $query = $PDO->prepare("SELECT * from admin where name =? and password = ?");
            $query->execute([$username, $password]);
            if ($query->rowCount() > 0) {
                // echo "Welcome";
                // var_dump($query->fetch());
                $_SESSION['logedin'] = true;
                $_SESSION['admin'] = $query->fetch();
                header('location:add.php');
            } else {
    ?>
                <div>
                    username or password is incorect
                </div>

            <?php            }
        } else {
            ?>
            <div>
                The username and the password are inportent
            </div>

    <?php
        }
    }
    ?>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="post">
                    <p style="font-size: 50px;">Welcome</p>
                    <p style="font-size: 10px;">The Name And The Password Is "admin"</p>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="username" placeholder="User name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password">
                    </div>
                    <button class="button login__submit">
                        <input type="submit" value="Log In Now" name="login">
                        <!-- <span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i> -->
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>