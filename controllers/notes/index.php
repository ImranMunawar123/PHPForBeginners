<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query("select * from notes where user_id = :user_id",["user_id" => 1])->get();

views("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);
