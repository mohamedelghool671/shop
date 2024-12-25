<?php 
require_once '../dbConnection.php';

if (isset($_POST['addCategory'])) {
    $title=trim(htmlspecialchars($_POST['title']));
    if (!empty($title)) {
    $query="insert into categories (title) values ('$title')";
    $run_query=mysqli_query($connect,$query);
    if ($run_query) {
$_SESSION['success']="category added successfully";
header("location:../admin/view/addCategory.php");
    }else {
$_SESSION['errors']="error adding category";
header("location:../admin/view/addCategory.php");
    }
    }else {
        $_SESSION['errors']="please enter a category title";
        header("location:../admin/view/addCategory.php");

    }
}else {
    header("location:../view/addCategory.php");
}