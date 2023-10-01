<?php

use Core\Session;

views("session/create.view.php", [
    'errors' => Session::get('errors')
]);
