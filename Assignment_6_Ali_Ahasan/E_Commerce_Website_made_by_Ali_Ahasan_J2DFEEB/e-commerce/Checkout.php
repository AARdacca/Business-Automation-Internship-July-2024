<?php
// Define the Checkout class to handle the checkout process.
class Checkout
{
    private $cart; // Private variable to store the Cart object.

    // Constructor to initialize the Checkout class with a Cart object.
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    // Method to process the checkout by clearing the cart and confirming the order placement.
    public function processCheckout()
    {
        $this->cart->clearCart(); // Clear all items in the cart.
        return "Checkout successful. Your order has been placed!"; // Return success message.
    }

    // Method to handle the scenario where no checkout is processed.
    public function processNotCheckout()
    {
        $this->cart->clearCart(); // Clear the cart even if no order is processed.
        return "Nothing ordered. Please order."; // Return message prompting to make an order.
    }
}
