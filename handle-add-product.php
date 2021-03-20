<?php

require 'functions.php';

session_start();
 
if(isset($_POST['submit']) && $_POST['submit'] == 'send') {
    
    $errors = []; 
    
    // name → required | string | min:5 | max:255
    if(empty($_POST['name'])) {
        $errors['name']['required'] = 'name is required';
    }

    if(!is_string($_POST['name'])) {
        $errors['name']['string'] = 'name must be string';
    }

    if(strlen($_POST['name']) < 5) {
        $errors['name']['min'] = 'name must be grater that 5';
    }

    if(strlen($_POST['name']) > 255) {
        $errors['name']['max'] = 'name must be less than 255';
    }

    // description → optional | string 
    if(!empty($_POST['description'])) {

        if(!is_string($_POST['description'])) {
            $errors['description']['string'] = 'description must be string';
        }
    }

    // price → required | number | min:0 
    if(empty($_POST['price'])) {
        $errors['price']['required'] = 'price is required';
    }

    if(!is_numeric($_POST['price'])) {
        $errors['price']['numeric'] = 'price must be numeric';
    }

    if($_POST['price'] < 0) {
        $errors['price']['min'] = 'price must be grater that 0';
    }

    if(count($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $_SESSION['success'] = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'discount_price' => getPriceWithDiscount($_POST['price']),
        ]; 
    }
    
    header('Location: add-product.php');
}

// else then print data (name - description if exists - price - price after discount using the function getPriceWithDiscount from question 2)
