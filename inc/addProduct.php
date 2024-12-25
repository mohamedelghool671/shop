<?php
require_once '../dbConnection.php';
 if (isset($_POST['addProduct'])) {
trim(htmlspecialchars(extract($_POST)));
$image=$_FILES['img'];
$image_name=$image['name'];
$image_tmp=$image['tmp_name'];
$ext=pathinfo($image_name, PATHINFO_EXTENSION);
$newName=uniqid().".$ext";
move_uploaded_file($image_tmp,"../admin/upload/$newName");
$query="INSERT INTO products (`category`, `title`, `description`, `quantity`, `price`, `image`) 
              VALUES ('$category', '$title', '$desc', $quantity, $price, '$newName')";
$run_query=mysqli_query($connect,$query);
if ($run_query) {
$_SESSION['success']="product added successfully";
header("location:../admin/view/addProduct.php");
}else {
$_SESSION['errors']="error while creating product";
header("location:../admin/view/addProduct.php");

}
 }else {
    header("location:../admin/view/addProduct.php");

 }

 
 ?>