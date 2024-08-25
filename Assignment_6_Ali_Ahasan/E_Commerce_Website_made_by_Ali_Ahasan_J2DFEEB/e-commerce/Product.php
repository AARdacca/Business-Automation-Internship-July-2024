<?php
// Define a class named 'Product'
class Product
{
    // Private properties accessible only within the class
    private $id;
    private $name;
    private $price;

    // Constructor to initialize a new Product object with an id, name, and price
    public function __construct($id, $name, $price)
    {
        $this->id = $id;       // Assign the product ID
        $this->name = $name;   // Assign the product name
        $this->price = $price; // Assign the product price
    }

    // Method to retrieve the product ID
    public function getId()
    {
        return $this->id;
    }

    // Method to retrieve the product name
    public function getName()
    {
        return $this->name;
    }

    // Method to retrieve the product price
    public function getPrice()
    {
        return $this->price;
    }
}
