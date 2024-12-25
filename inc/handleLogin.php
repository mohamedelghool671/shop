<?php 
require_once '../dbConnection.php';
 if (isset($_POST['login'])) {
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $errors=[];
            // email validation
            if (empty($email)) {
                $errors['email'] = "Email is required";
            }
            // password validation 
            if (empty($password)) {
                $errors['password'] = "Password is required";
            }
 if (empty($errors)) {

$query="select * from users where email = '$email'";
$run_query=mysqli_query($connect,$query); 
if (mysqli_num_rows($run_query)>0) {
$result=mysqli_fetch_assoc($run_query);
$password_hashed=$result['password'];
$role=$result['role'];
                    if (password_verify($password,$password_hashed)) {
                    if ($role == 1) {
                        header("location:../admin/view/layout.php");
                    }else if ($role == 2) {
                        header("location:../shop.php"); 
                    }
                    }else {
                        $_SESSION['errors']=["password verification failed"];
                        header("location:../login.php");
                    }
}else {
                $_SESSION['errors']=["this email not found"];
                header("location:../login.php");
}

}else {
    $_SESSION['errors']=$errors;
    header("location:../login.php");

}
 }else {
    header("location:../login.php");
 }