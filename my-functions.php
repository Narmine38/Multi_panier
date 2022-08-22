<?php
function formatPrice(int $param): void
{
    $param = $param / 100;
    echo number_format($param, 2) . "€";
}

function priceExcludingVAT(int $prixTTC, int $tva = 20): int
{
    return ($prixTTC) / (1 + $tva / 100);
}

function discountedPrice(int $prixTTC, int $discount): int
{
    return ($prixTTC) / (1 + $discount / 100);
}

function emptyCart():void {
    session_destroy();
}
function total($prix, $quantity){

    return  $prix * $quantity;

}

