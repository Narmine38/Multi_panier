<?php
session_start();
require 'products.php';
require 'my-functions.php';

?>

    <a href="cart.php">panier</a>

    <pre>
    <?php

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'],$_POST);

    ?>
    </pre>


    <?php foreach ($products as $key => $product) { ?>

        <div class="container-xxl d-flex justify-content-center  p-2  border rounded mt-2 bg-dark">

            <div class="col-md-3 mt-1">
                <img class="" src="<?= $product["picture_url"] ?>" alt="livre">
            </div>

            <div class="col-md-6 mt-1">

                <h5 class="text-white"><?php echo $product["name"] ?></h5>

                <div class="d-flex flex-row text-white">
                    <span>Nombre de pages: <?php echo $product["no_of_pages"] ?></span>
                </div>

                <div class="mt-1 mb-1 spec-1">

                    <span>Date de parution: <?php echo $product["release_date"] ?></span>
                    <span class="dot"></span>
                    <span>Editeur: <?php echo $product["editor"] ?></span>
                    <span class="dot"></span>
                    <span>Collection: <?php echo $product["collection"] ?><br></span>
                </div>

                <div class="mt-1 mb-1 spec-1">
                    <span>Format: <?php echo $product["format"] ?></span>
                    <span class="dot"></span>
                    <span>Auteur: <?php echo $product["author"] ?></span>
                    <span class="dot"></span>
                    <span>Poids: <?php echo $product["weight"] ?><br></span>
                </div>
                <p class="text-justify text-truncate para mb-0 text-white-50"><?php echo $product["resum"] ?></p>
            </div>

            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                <div class="d-flex flex-row align-items-center">
                    <?php if ($product['discount'] == null) {
                        ?>

                        <h4 class="mr-3 text-white"><?php formatPrice($product["price"]) ?></h4>


                        <?php
                    } else { ?>
                        <span class="strike-text"><?php formatPrice($product["price"]) ?></span>
                        <h4 id="prixttc"
                            class="mr-3 text-white"><?php formatPrice(discountedPrice($product["price"], $product['discount'])); ?></h4>

                        <span class="text-white" id="pourcent">-<?= $product['discount'] ?>%</span>
                        <?php
                    } ?>

                </div>

                <form method="post" >
                <label for="quantity"> quantity</label>
                <label class="justify-content-center">
                    <input style="width: 200px" type="number" name="quantity" min="0" max="10">
                </label><input type="hidden" name="price" value="<?= $product['price'] ?>">

                <input type="hidden" name="name" value="<?= $product['name'] ?>">
                <br>
                    <div class="d-flex flex-column mt-4 ">
                        <button style="width: 50%" class="btn btn-primary btn-sm" type="submit">Ajouter au panier</button>
                    </div>
                </form>
            </div>
        </div>
    <?php }



