<?php
session_start();
require 'my-functions.php';
?>
<pre>
    <a href="<?php emptyCart() ?>">session_destroy</a>
    <?php var_dump($_SESSION['cart']); ?>

</pre>


<?php
foreach ($_SESSION['cart'] as $key => $value) { ?>
    <h2>Articles : <?php echo $_SESSION['cart'][$key]['name'] ?></h2>
    <h2>Prix a l'unité : <?php echo formatPrice($_SESSION['cart'][$key]['price']) ?></h2>
    <h2>Quantity : <?php echo $_SESSION['cart'][$key]['quantity'] ?></h2>
    <h2>prix
        Total: <?php echo formatPrice(total($_SESSION['cart'][$key]['price'], $_SESSION['cart'][$key]['quantity'])) ?></h2>
<?php } ?>

<!--<h6> Prix finale : --><?php //echo  ?><!--</h6>-->









