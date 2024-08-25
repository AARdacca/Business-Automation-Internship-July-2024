<?php

require_once 'Product.php';
require_once 'Cart.php';
require_once 'Checkout.php';

class Index
{
    public $cart;
    public $products;
    public $message;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->products = $this->loadProducts();
        $this->message = "";
        $this->processActions();
    }

    private function isLoggedIn()
    {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1;
    }

    private function loadProducts()
    {
        $filePath = 'e-commerce/products.json';
        if (!file_exists($filePath)) {
            $filePath = 'products.json';
        }
        $json = file_get_contents($filePath);
        $productsData = json_decode($json, true);

        $products = [];
        foreach ($productsData as $productData) {
            $products[] = new Product($productData['id'], $productData['name'], $productData['price']);
        }
        return $products;
    }

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
                header("Location: /assignment_6/user/login.php");
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

    public function homePage()
    {
        echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
        <a href='/assignment_6/user/'>Go to Home</a>";
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
        <?php foreach ($e_commerceIndex->products as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?add=<?php echo $product->getId(); ?>"><button type="button">Add to Cart</button></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        <?php foreach ($e_commerceIndex->cart->getProducts() as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?remove=<?php echo $product->getId(); ?>"><button type="button">Remove</button></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>Total: $<?php echo $e_commerceIndex->cart->getTotalPrice(); ?></p>
    <a href="?checkout=true"><button type="button">Checkout</button></a>

    <?php if (isset($e_commerceIndex->message)): ?>
        <p><?php echo $e_commerceIndex->message; ?></p>
    <?php endif; ?>
</body>

</html>

<?php
$e_commerceIndex->homePage();
?>