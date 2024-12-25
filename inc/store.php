<?php 

require_once '../dbConnection.php';

if (isset($_POST['signup'])) {
  
    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $address = trim(htmlspecialchars($_POST['address']));
    $phone = trim(htmlspecialchars($_POST['phone']));

    $errors = []; 
// name validation 
        if (empty($username)) {
            $errors['name'] = "Name is required";
        }
        if (!(strlen($username) >= 5 && strlen($username) <= 15)) {
            $errors['name'] = "Name length must be between 5 and 15 characters";
        }
        if (!preg_match("/^[a-zA-Z]+$/", $username)) {
            $errors['name'] = "Name must contain only characters";
        }
    // email validation
        if (empty($email)) {
            $errors['email'] = "Email is required";
        }
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors['email'] = "Enter a valid email";
        }
    // password validation 
        if (empty($password)) {
            $errors['password'] = "Password is required";
        }
        if (strlen($password) < 8) {
            $errors['password'] = "Password must contain at least 8 characters";
        }
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{8,}$/", $password)) {
            $errors['password'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.";
        }

    // address validation
        if (empty($address)) {
            $errors['address'] = "Address is required";
        }
        if (strlen($address) < 10 || strlen($address) > 100) {
            $errors['address'] = "Address must be between 10 and 100 characters";
        }
        if (!preg_match("/^[a-zA-Z0-9\s,.'-]+$/", $address)) {
            $errors['address'] = "Address contains invalid characters";
        }
// phone validation 
        if (empty($phone)) {
            $errors['phone'] = "Phone number is required";
        }
        if (!preg_match("/^\d{10,15}$/", $phone)) {
            $errors['phone'] = "Phone number must contain only digits and be between 10 and 15 digits long";
        }
    

    if (empty($errors)) {
                $username = mysqli_real_escape_string($connect, $username);
                $email = mysqli_real_escape_string($connect, $email);
                $address = mysqli_real_escape_string($connect, $address);
                $phone = mysqli_real_escape_string($connect, $phone);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO users (username, email, password, address, phone) 
                        VALUES ('$username', '$email', '$hashed_password', '$address', '$phone')";
                $run_query = mysqli_query($connect, $query);
                if ($run_query) {
                    $_SESSION['success'] = "User added successfully.";
                    header("Location: ../signup.php");
            
                }else {
                    $_SESSION['errors'] = "Error while inserting user.";
                    header("Location: ../signup.php");
            
                }
    } else {
        $_SESSION['errors']=$errors;
        header("Location: ../signup.php");

    }
} else {
    header("Location: ../signup.php");
}
