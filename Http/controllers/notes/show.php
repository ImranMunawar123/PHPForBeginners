<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserID = 1;

$note = $db->query("select * from notes where id = :id",["id" => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserID);

views("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);