<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserID = 1;

//find the corresponding note
$note = $db->query("select * from notes where id = :id",["id" => $_POST['id']])->findOrFail();


// authorize the user can edit the note
authorize($note['user_id'] === $currentUserID);


// validate the form
$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = "A body of no more 1000 characters is required.";
}

if(count($errors)){
    return views("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => [],
        'note' => $note
    ]);
}

// update the notes table
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: /notes');
die();