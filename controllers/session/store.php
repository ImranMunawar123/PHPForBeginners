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

if(! Validator::string($password)){
    $errors['password'] = "Please provide password.";
}

if(! empty($errors)){
    return views("session/create.view.php", [
        'errors' => $errors
    ]);
}

// Check if user exists in the database against the given email and password
$user = $db->query("select * from users where email = :email", [
        "email" => $email
])->find();

// if noo user then redirect
if($user){
    if(password_verify($password, $user['password'])){
        login($email);

        header('location: /');
        exit();
    }
}

return views("session/create.view.php", [
    'errors' => [
        'email' => "No user found against given email and password"
    ]
]);

