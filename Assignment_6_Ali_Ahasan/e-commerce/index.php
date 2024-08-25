<?php

require_once 'Product.php';
require_once 'Cart.php';
require_once 'Checkout.php';


$cart = new Cart();
$products = [];

function isLoggedIn()
{
    return isset($_SESSION['logged_in_check']) && $_SESSION['logged_in_check'] == 1;
}

// $products = [
//     new Product(1, "Laptop", 1000),
//     new Product(2, "Smartphone", 500),
//     new Product(3, "Tablet", 300)
// ];

// Load JSON file

// Attempt to read the file from the 'e-commerce' directory
$filePath = 'e-commerce/products.json';

if (!file_exists($filePath)) {
    // If the file is not found in the 'e-commerce' directory, try the root directory
    $filePath = 'products.json';
}
$json = file_get_contents($filePath);

// Decode the JSON data into an associative array
$productsData = json_decode($json, true);

// Initialize an empty array to hold Product objects


// Iterate over each product data and create Product objects
foreach ($productsData as $productData) {
    $products[] = new Product($productData['id'], $productData['name'], $productData['price']);
}


if (isset($_GET['add'])) {
    $productId = $_GET['add'];
    foreach ($products as $product) {
        if ($product->getId() == $productId) {
            $cart->addProduct($product);
        }
    }
}


if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    $cart->removeProduct($productId);
}



if (isset($_GET['checkout'])) {

    if (!isLoggedIn()) { // Check if the user is logged in
        header("Location: user/login.php"); // Redirect to login page if not logged in
        exit;
    }

    $checkout = new Checkout($cart);
    if (($cart->getTotalPrice()) <= 0) {
        $message = $checkout->processNotCheckout();
    } else {
        $message = $checkout->processCheckout();
    }
}


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
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?add=<?php echo $product->getId(); ?>"><button type="button">Add to Cart</button></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        <?php foreach ($cart->getProducts() as $product): ?>
            <li>
                <?php echo $product->getName(); ?> - $<?php echo $product->getPrice(); ?>
                <a href="?remove=<?php echo $product->getId(); ?>"><button type="button">Remove</button></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>Total: $<?php echo $cart->getTotalPrice(); ?></p>
    <a href="?checkout=true"><button type="button">Checkout</button></a>

    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>

</html>

<?php 
    // Link to the home page
    echo "<h3 style='display:inline;'><br><br><br>Home Page? </h3>
          <a href='/assignment_6/user/'>Go to Home</a>";
?>