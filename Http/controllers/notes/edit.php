<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];
$currentUserID = 1;

$note = $db->query("select * from notes where id = :id",["id" => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserID);

views("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);