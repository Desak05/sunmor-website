<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="products">
        <form action="utama.php" method="post">
            <h1 class="heading">MENU</h1>
            <h3 class="subheading">bla bla</h3>

            <div class="box-container">

                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM tbl_products") or die('query failed');
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                ?>
                        <form method="post" class="box" action="">
                            <?php
                            echo "<p>Gambar: " . $fetch_product['img'] . "</p>";
                            ?>
                            <img src="../img/echo $fetch_product['img']; ?>" alt="">
                            <div class="name"><?php echo $fetch_product['name']; ?></div>
                            <div class="price">Rp.<?php echo $fetch_product['price']; ?>/-</div>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['img']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </form>
                <?php
                    };
                };
                ?>

            </div>
        </form>
    </div>
</body>

</html>