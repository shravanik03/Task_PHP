<?php

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function checkForErrorsSignUp($sanitizedInputs)
{
    $errors = array();

    if (empty($sanitizedInputs['email']) || empty($sanitizedInputs['password']) || empty($sanitizedInputs['confirm-password']) || empty($sanitizedInputs['firstname']) || empty($sanitizedInputs['lastname'])) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($sanitizedInputs['email'], FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if ($sanitizedInputs['password'] !== $sanitizedInputs['confirm-password']) {
        array_push($errors, "Password and confirm password should be same");
    }
    $minLength = 8;
    $hasUppercase = preg_match('/[A-Z]/', $sanitizedInputs['password']);
    $hasLowercase = preg_match('/[a-z]/', $sanitizedInputs['password']);
    $hasNumber = preg_match('/\d/', $sanitizedInputs['password']);
    $hasSpecialChar = preg_match('/[^a-zA-Z0-9]/', $sanitizedInputs['password']);
    if (strlen($sanitizedInputs['password']) < $minLength) {
        array_push($errors, "Password length must be minimum 8");
    } else if(!$hasUppercase){
        array_push($errors, "Password should contain atleast 1 upper character");
    } else if(!$hasLowercase){
        array_push($errors, "Password should contain atleast 1 lower character");
    } else if(!$hasNumber){
        array_push($errors, "Password should contain atleast one number");
    } else if(!$hasSpecialChar){
        array_push($errors, "Password should contain at least one special character");
    }

    require_once "database.php";
    $email = $sanitizedInputs['email'];
    $sql = "SELECT * FROM user_info WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        array_push($errors, "Email is already used");
    }

    return $errors;
}