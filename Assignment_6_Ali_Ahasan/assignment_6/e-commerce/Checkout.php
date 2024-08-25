<?php
class Checkout
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function processCheckout()
    {
        // Normally, here you would integrate with a payment gateway
        // For simplicity, let's just clear the cart and return a success message
        $this->cart->clearCart();
        return "Checkout successful. Your order has been placed!";
    }

    public function processNotCheckout()
    {
        // Normally, here you would integrate with a payment gateway
        // For simplicity, let's just clear the cart and return a success message
        $this->cart->clearCart();
        return "Nothing ordered. Please order.";
    }
}
?> <?
