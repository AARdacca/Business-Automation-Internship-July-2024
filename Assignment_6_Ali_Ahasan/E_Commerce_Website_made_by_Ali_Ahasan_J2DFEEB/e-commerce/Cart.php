<?php
// Start or resume a session
session_start();

// Define the Cart class to manage shopping cart operations
class Cart
{
    // Constructor to initialize the shopping cart
    public function __construct()
    {
        // Check if the cart doesn't already exist in the session
        if (!isset($_SESSION['cart'])) {
            // If not, initialize it as an empty array
            $_SESSION['cart'] = [];
        }
    }

    // Add a product to the cart
    public function addProduct(Product $product)
    {
        // Add the product to the session cart array
        // Product ID is used as the key for easy access and prevention of duplication
        $_SESSION['cart'][$product->getId()] = $product;
    }

    // Remove a product from the cart by its ID
    public function removeProduct($productId)
    {
        // Unset the product from the session cart array using its ID
        unset($_SESSION['cart'][$productId]);
    }

    // Retrieve all products from the cart
    public function getProducts()
    {
        // Return the array of products in the cart
        return $_SESSION['cart'];
    }

    // Clear all items from the cart
    public function clearCart()
    {
        // Reset the cart in the session to an empty array
        $_SESSION['cart'] = [];
    }

    // Calculate the total price of all items in the cart
    public function getTotalPrice()
    {
        // Initialize total price to zero
        $total = 0;
        // Loop through each product in the cart
        foreach ($_SESSION['cart'] as $product) {
            // Add each product's price to the total
            $total += $product->getPrice();
        }
        // Return the calculated total price
        return $total;
    }
}
