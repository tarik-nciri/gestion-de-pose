<?php
include 'config.php';
session_start();
if (!isset($_SESSION['logedin'])) {
    header("location: login.php");
    exit();
}

if (isset($_POST["submit"])) {
    $filename = "";
    if (isset($_FILES["file"])) {
        $image = $_FILES["file"]["name"];
        $filename =/* uniqid().*/  $image;
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $filename);
    }

    $productprice = $_POST["productprice"];
    $productname = $_POST["productname"];
    $query = "INSERT INTO products (id,photo,prise,name) value (null,'$filename','$productprice','$productname')";

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
                    <h2><i class="fa-solid fa-plus"></i> Add products</h2>

                </div>
            </div>

            <span></span>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="content">
                    <div class="felx">
                        <i class="fa-solid fa-upload"></i>
                        <p>upload</p>
                        <input class="flex-input" type="file" name="file" required="required">
                    </div>

                    <div class="add-input">
                        <div class="picture">

                        </div>
                        <label>Product Price</label>
                        <input type="text" name="productprice" placeholder="Product Price">
                        <label>Product Name</label>
                        <input type="text" name="productname" placeholder="product Name">
                        <input class="submit" name="submit" type="submit" value="Send">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d0584a94d8.js" crossorigin="anonymous"></script>
</body>

</html>