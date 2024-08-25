<?php
session_start();

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addProduct(Product $product) {
        $_SESSION['cart'][$product->getId()] = $product;
    }

    public function removeProduct($productId) {
        unset($_SESSION['cart'][$productId]);
    }

    public function getProducts() {
        return $_SESSION['cart'];
    }

    public function clearCart() {
        $_SESSION['cart'] = [];
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($_SESSION['cart'] as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }
}
?> <?