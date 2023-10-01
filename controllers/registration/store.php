<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Validate email and password
$errors = [];

if(! Validator::email($email)){
    $errors['email'] = "Please provide a valid email.";
}

if(! Validator::string($password, 7, 15)){
    $errors['password'] = "Please provide password of minimum 7 characters & maximum 15 characters is required.";
}

if(! empty($errors)){
    return views("registration/create.view.php", [
        'errors' => $errors
    ]);
}

// Check if user already exists in the database against the given email
$user = $db->query("select * from users where email = :email", [
        "email" => $email
])->find();

// if yes then redirect the user to register with errors
if($user){
    header('location: /');
    exit();
}else{
    // else create a new user in the database and create user session and redirect user to home page
    $user = $db->query("INSERT into users(email, password) VALUES(:email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($email);

    header('location: /');
    exit();
}



