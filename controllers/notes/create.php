<?php

use Core\Database;

require base_path("Core/Validator.php");

$config = require base_path("config.php");
$db = new Database($config["database"]);
$errors = [];

if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(! Validator::string($_POST['body'], 1, 1000)){
        $errors['body'] = "A body of no more 1000 characters is required.";
    }

    if(empty($errors)){
        $db->query("INSERT into notes(body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST['body'],
            "user_id" => 1
        ]);
    }

}

views("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);
