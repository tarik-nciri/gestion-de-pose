<?php
include 'config.php';
session_start();
if (!isset($_SESSION['logedin'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $password = $_POST["password"];
    $query = "INSERT INTO admin (id,name,password) value (null,'$name','$password')";

    if ($PDO->query($query)) {
        echo "Insert Successeful";
    } else {
        echo "You Have An Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="admin">
        <a href="logout.php">LOG OUT</a>
    </div>
    <div class="container">
        <div class="parent">
            <div class="action">
                <div class="action-add-edit">
                    <div class="add"><a href="add.php">Add products</a></div>
                    <div class="edit"><a href="edit.php">Edit Products</a></div>
                    <div class="edit"><a href="add-admin.php">Add New Admin</a></div>
                </div>
                <div class="action-title">
                    <h2><i class="fa-solid fa-plus"></i> Add New Admin</h2>

                </div>
            </div>

            <span></span>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="content">
                    <div class="add-input">
                        <div class="picture">
                        </div>
                        <label>Admin Name</label>
                        <input type="text" name="name" placeholder="Admin Name">
                        <label>Password</label>
                        <input type="text" name="password" placeholder="Password">
                        <input class="submit" name="submit" type="submit" value="Send">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d0584a94d8.js" crossorigin="anonymous"></script>
</body>

</html>