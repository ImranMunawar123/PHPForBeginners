<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config["database"]);

$currentUserID = 1;

$note = $db->query("select * from notes where id = :id",["id" => $_GET['id']])->findOrFail();
authorize($note['user_id'] === $currentUserID);

views("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);