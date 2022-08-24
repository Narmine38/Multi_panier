<?php
session_start();
require 'my-functions.php';
require 'Transports.php';
var_dump($_SESSION['cart']);
foreach ($_SESSION['cart'] as $key => $value) {
    $total = $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['quantity'];
    $priceTotal += $total;
}
?>
    <a href="<?php emptyCart() ?>">session_destroy</a>

<?php
foreach ($_SESSION['cart'] as $key => $value) { ?>
    <h2>Articles : <?php echo $_SESSION['cart'][$key]['name'] ?></h2>
    <h2>Prix a l'unité : <?php echo formatPrice($_SESSION['cart'][$key]['price']) ?></h2>
    <h2>Quantity : <?php echo $_SESSION['cart'][$key]['quantity'] ?></h2>
<?php } ?>

<h6> Prix Tota : <?php echo formatPrice($priceTotal)  ?></h6>
<h6> Prix HTT : <?php echo formatPrice(priceExcludingVAT($priceTotal))  ?></h6>
<h6> tva : <?php echo formatPrice($priceTotal - priceExcludingVAT($priceTotal) ) ?></h6>

<form method="post" >
    <select name="delivery" class="me-5 rounded-pill" style="width: 60%">
        <option value="">Sélectionnez un transporteur</option>
        <?php foreach ($deliveryCompagny as $Key => $delivery) { ?>
            <option value="<?= $Key ?>"> <?= $Key ?></option>
        <?php } ?>
    </select>
    <input style="width: 200px" class="btn btn-primary" type="submit" value="Valider">
</form>









