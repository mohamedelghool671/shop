<?php include 'header.php' ?>
<?php include 'navbar.php';
session_start();

?>

<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                    <td>ConfirmOrder</td>
                </tr>
            </thead>
   
            <tbody>
            <?php
            if (isset($_GET['id'])) 
            $id = $_GET['id'];
            if (!empty($_SESSION['cart'])) :
                foreach ($_SESSION['cart'] as $id => $cart) :
            ?>
            <tr>
                <td><img src="admin/upload/<?= $cart['image']; ?>" alt="<?= $cart['title']; ?>"></td>
                <td><?= $cart['title']; ?></td>
                <td><?= $cart['description']; ?></td>
                <td><?= $cart['quantity']; ?></td>
                <td><?= $cart['price']; ?></td>
                <td><?= $cart['subtotal']; ?></td>
                <td><a href="removeFromCart.php?id=<?= $id; ?>" class="btn btn-danger">Remove</a></td>
                <td><a href="EditCart.php?id=<?= $id; ?>" class="btn btn-success">Edit</a></td>
                <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            </tr>
            <?php
                endforeach;
            else :
                echo "<tr><td colspan='7'>Your cart is empty.</td></tr>";
            endif;
            ?>
            </tbody>
            <!-- confirm order  -->
            <!-- <td><button type="submit" name="" class="btn btn-success">Confirm</button></td> -->
            
        </table>
    </section>

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

    <?php include "footer.php" ?>

