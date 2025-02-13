<?php

// Include required class files.
require_once 'Product.php';
require_once 'Cart.php';
require_once 'Checkout.php';

// Define the Index class which will handle the core functionality of the e-commerce system.
class Index
{
    public $cart;
    public $products;
    public $message;

    // Constructor initializes the cart, loads products, and processes any actions from the request.
    public function __construct()
    {
        $this->cart = new Cart();
        $this->products = $this->loadProducts();
        $this->message = "";
        $this->processActions();
    }

    // Helper function to check if a user is logged in.
    private function isLoggedIn()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1;
    }

    // Loads products from a JSON file.
    private function loadProducts()
    {
        $filePath = 'e-commerce/products.json';
        if (!file_exists($filePath)) {
            $filePath = 'products.json'; // Fallback if the preferred path is not found.
        }
        $json = file_get_contents($filePath);
        $productsData = json_decode($json, true);

        $products = [];
        foreach ($productsData as $productData) {
            $products[] = new Product($productData['id'], $productData['name'], $productData['price']);
        }
        return $products;
    }

    // Processes actions based on GET parameters: add, remove, checkout.
    private function processActions()
    {
        if (isset($_GET['add'])) {
            $productId = $_GET['add'];
            foreach ($this->products as $product) {
                if ($product->getId() == $productId) {
                    $this->cart->addProduct($product);
                }
            }
        }

        if (isset($_GET['remove'])) {
            $productId = $_GET['remove'];
            $this->cart->removeProduct($productId);
        }

        if (isset($_GET['checkout'])) {
            if (!$this->isLoggedIn()) {
                header("Location: /E_Commerce_Website_made_by_Ali_Ahasan_J2DFEEB/user/login.php");
                exit;
            }

            $checkout = new Checkout($this->cart);
            if ($this->cart->getTotalPrice() <= 0) {
                $this->message = "No items in cart to checkout.";
            } else {
                $this->message = $checkout->processCheckout();
            }
        }
    }

    // Method to display a simple home page navigation link.
    public function homePage()
    {
        echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
        <a href='/E_Commerce_Website_made_by_Ali_Ahasan_J2DFEEB/user/'>Go to Home</a>";
    }

    // Method to display a simple login page navigation link.
    public function loginPage()
    {
        if (!$this->isLoggedIn()) {
            echo "<h3 style='display:inline;'><br><br><br>Login Access: </h3>
            <a href='/E_Commerce_Website_made_by_Ali_Ahasan_J2DFEEB/user/login.php'>Login</a>";
        }
    }
}

$e_commerceIndex = new Index;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce System</title>
</head>

<body>
    <h1>Products</h1>
    <ul>
        <!-- Loop through products and display them with an "Add to Cart" button. -->
        <?php foreach ($e_commerceIndex->products as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?add=<?php echo $product->getId(); ?>"><button type="button">Add to Cart</button></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        <!-- Loop through cart items and display them with a "Remove" button. -->
        <?php foreach ($e_commerceIndex->cart->getProducts() as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?remove=<?php echo $product->getId(); ?>"><button type="button">Remove</button></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>Total: $<?php echo $e_commerceIndex->cart->getTotalPrice(); ?></p>
    <a href="?checkout=true"><button type="button">Checkout</button></a>

    <!-- Display any messages such as errors or notifications. -->
    <?php if (isset($e_commerceIndex->message)): ?>
        <p><?php echo $e_commerceIndex->message; ?></p>
    <?php endif; ?>
</body>

</html>

<?php
// Call to display the home page link.
$e_commerceIndex->homePage();
$e_commerceIndex->loginPage();
?>