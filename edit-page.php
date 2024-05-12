<?php
include 'config.php';
session_start();
if (!isset($_SESSION['logedin'])) {
    header("location: login.php");
    exit();
}
// if (isset($_POST["submit"])) {
//     $filename = "";
//     if (isset($_FILES["file"])) {
//         $image = $_FILES["file"]["name"];
//         $filename =/* uniqid().*/  $image;
//         move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $filename);
//     }

//     $productprice = $_POST["productprice"];
//     $productname = $_POST["productname"];
//     $query = "INSERT INTO products (id,photo,prise,name) value (null,'$filename','$productprice','$productname')";

//     if ($PDO->query($query)) {
//         echo "Insert Successeful";
//     } else {
//         echo "You Have An Error";
//     }
// }


if (!isset($_POST['id'])) {
    header("location:edit.php");
}


$id = $_POST["id"];
$query = $PDO->prepare('SELECT * from products where id = ?');
$query->execute([$id]);
$items = $query->fetch(PDO::FETCH_ASSOC);
// echo $id;
// echo "<pre>";
// print_r($items);
// echo "</pre>";

if (isset($_POST["edit2"])) {
    $filename = "";
    if (isset($_FILES["file"])) {
        $image = $_FILES["file"]["name"];
        $filename =/* uniqid().*/  $image;
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $filename);
    }
    $productprice = $_POST["productprice"];
    $productname = $_POST["productname"];

    if (!empty($id) && !empty($productprice) && !empty($filename)&& !empty($productname)) {
        $query = $PDO->prepare("UPDATE products  set photo = ? , prise = ? , name = ? where id = ?");
        $result=$query->execute([$filename,$productprice,$productname,$id]);
        if ($result == true) {
            header("location:edit.php");
        }
        echo "id :$id , productprice:$productprice , image:$filename";
    } else {
        echo "<div>There are empty boxes</div>";
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
                    <h2><i class="fa-solid fa-pen-to-square"></i> Edit Products</h2>

                </div>
            </div>
            <?php
            // var_dump($_POST)
            ?>
            <span></span>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="content">
                    <div class="felx">
                        <i class="fa-solid fa-upload"></i>
                        <p>Edit</p>
                        <input class="flex-input" type="file" name="file" required="required" value="<?php echo $items["photo"] ?>">
                    </div>

                    <div class="add-input">
                        <input type="hidden" name="id" value="<?php echo $items["id"] ?>">
                        <label>Product Price</label>
                        <input type="text" name="productprice" placeholder="Product Price" value="<?php echo $items["prise"] ?>">
                        <label>Product Name</label>
                        <input type="text" name="productname" placeholder="product Name" value="<?php echo $items["name"] ?>">
                        <input class="submit" name="edit2" type="submit" value="Edit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d0584a94d8.js" crossorigin="anonymous"></script>
</body>

</html>