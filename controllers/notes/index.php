<?php

use Core\Database;

$config = require base_path("config.php");
$db = new Database($config["database"]);

$notes = $db->query("select * from notes where user_id = :user_id",["user_id" => 1])->get();

views("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);