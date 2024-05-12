<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>        
    <div class="admin">
        <a href="login.php">Admin Dashbord</a>
    </div>

    <div class="product">

        <div class="pictures">
            <div class="reserch">
                <h1>Coffee</h1>
                <form action="" class="form">
                    <input type="text" class="" placeholder="search">
                    <input type="submit" class="search" value="search">
                </form>
            </div>
            <br>
            <br>
            <div class="list">
                <?php
                $content = "SELECT * from products";
                $result = $PDO->prepare($content);
                $result->execute();
                if ($result->rowcount() > 0) {
                    while ($data = $result->fetch()) {
                        echo "<div class='card' id='card' style='margin-top:30px'>";
                        echo "<div class='card-img-top'><img alt='' src='products-pictures/" . $data['photo'] . "' width='150px' style='width:250px; height: 150px; '/></div>";
                        echo "<div class='price'>
                              <div class='card-title text-center pt-2'>prise :</div><div id='price' class='theprice text-center pt-2'> " . $data['prise'] . " DH</div>
                              </div>";
                        echo "<div class='name'>
                              <div class='card-title text-center pt-2'>Name :</div><div id='name' class='thename card-title text-center pt-2'> " . $data['name'] . "</div>
                              </div>";
                        echo "<div id='name' ><button style='background-color:#E48F45;padding-left:5px;color:white' class='btn text-center ' >Order Now</button></div>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='text-danger text-center'>Aucun stagiaire trouvé</div>";
                }
                ?>
            </div>
        </div>
        <div class="tiket">
            <h1>Tiket</h1>
            <div class="product-conter">
                <p class="count">0</p>
            </div>
            <div class="tiket-header">
                <div>Name Of Coffee</div>
                <div>Price</div>
            </div>
            <div class="footer-tiket">
                <div class="total-button">
                    <button class="btn" type="submit" name="valid">valid</button>
                    <div class="product-conter-footer">
                        <p class="count-footer">0MAD</p>
                    </div>
                </div>

            </div>

        </div>
    </div>







    




    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/d0584a94d8.js" crossorigin="anonymous"></script>
</body>

</html>