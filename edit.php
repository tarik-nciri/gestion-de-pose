<?php
include 'config.php';
session_start();
if (!isset($_SESSION['logedin'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="admin">
        <a href="logout.php">LOG OUT</a>
    </div>
    <div class="container">
        <div class="parent" style="height: auto;">
            <div class="action">
                <div class="action-add-edit">
                    <div class="add"><a href="add.php" style="text-decoration: none; color:black">Add products</a></div>
                    <div class="edit"><a href="edit.php" style="text-decoration: none; color:black">Edit Products</a></div>
                    <div class="edit"><a href="add-admin.php" style="text-decoration: none; color:black">Add New Admin</a></div>

                </div>
                <div class="action-title">
                    <h2><i class="fa-solid fa-pen-to-square"></i> Edit Products</h2>
                </div>
            </div>

            <span></span>
            <div class="content-edit">
                <div class="felx-edit">
                    <!-- <input class="flex-input" type="file" name="file" id="file">
                    <i class="fa-solid fa-upload"></i> -->
                    <label for="choices">Choose a Product</label>
                    <?php
                    $content = "SELECT * from products";
                    $result = $PDO->prepare($content);
                    $result->execute();
                    ?>
                    <table class="table" style="width: 45rem;">
                        <!-- <tbody> -->
                        <thead>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    prise
                                </th>
                                <th style="padding-left:40px">
                                    action
                                </th>
                            </tr>
                        </thead>

                        <?php
                        if ($result->rowcount() > 0) {
                            while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <!-- // echo "<option value=" . $data['name'] . "> " . $data['name'] . " </option>"; -->

                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo $data["id"] ?>
                                        </td>
                                        <td>
                                            <?php echo $data["name"] ?>
                                        </td>
                                        <td>
                                            <?php echo $data["prise"] ?>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                <input formaction="edit-page.php" class="btn btn-primary" type="submit" value="Edit" name="edit">
                                                <input formaction="delet-page.php" class="btn btn-danger" type="submit" value="delet" name="delet">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>


                                <!-- //     echo "<div class='card-img-top'><img alt='' src='products-pictures/" . $data['photo'] . "' width='150px' style='width:250px; height: 150px; '/></div>";
                                //     echo "<div class='price'>
                                //   <div class='card-title text-center pt-2'>prise :</div><div id='price' class='theprice text-center pt-2'> " . $data['prise'] . "</div>
                                //   </div>";
                                //     echo "<div class='name'>
                                //   <div class='card-title text-center pt-2'>Name :</div><div id='name' class='thename card-title text-center pt-2'> " . $data['name'] . "</div>
                                //   </div>";
                                //     echo "<div id='name' ><button style='background-color:#E48F45;padding-left:5px;color:white' class='btn text-center ' >Order Now</button></div>";
                                //     echo "</div>"; -->
                        <?php
                            }
                        } else {
                            echo "<div class='text-danger text-center'>Aucun produit trouvé</div>";
                        }
                        ?>
                        <!-- </tbody> -->
                    </table>
                    <!-- <div class="edit-input">
                        <form action="" method="post">
                            <input type="text" name="id" value="<?php echo $data['id'] ?>" >
                            <input class="edit-page" type="submit" value="Edit" name="edit">
                            <input class="edit-page" type="submit" value="delet" name="delet">
                            <a class="edit-page" href="edit-page.php">Edit</a> 
                        </form>
                    </div> -->

                </div>

            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d0584a94d8.js" crossorigin="anonymous"></script>
</body>

</html>