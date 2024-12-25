<?php 

require_once '../dbConnection.php';

if (isset($_POST['addCart']) && isset($_GET['id'])) {
    $id = trim(htmlspecialchars($_GET['id']));
    $quantity = intval($_POST['quantity']); 

    $query = "SELECT * FROM products WHERE id = $id";
    $run_query = mysqli_query($connect, $query);

    if (mysqli_num_rows($run_query) == 1) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $result = mysqli_fetch_assoc($run_query);
        $_SESSION['cart'][$id] = [
            "title" => $result['title'],
            "price" => $result['price'],
            "description" => $result['description'],
            "image" => $result['image'],
            "quantity" => $quantity,
            "category" => $result['category'],
            "subtotal" => ((float) $result['price'] * $quantity)
        ];
        header("Location: ../cart.php?id=$id");
    } else {
        $_SESSION['errors'] = "Product not found.";
        header("Location: ../shop.php");
    }
} else {
    header("Location: ../shop.php");
}
