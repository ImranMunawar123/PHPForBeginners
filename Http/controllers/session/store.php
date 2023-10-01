<?php

use Core\Authentictor;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email, $password)){
    $auth = new Authentictor();

    if($auth->attempt($email, $password)){
        redirect('/');
    }

    $form->error('email', 'No matching account found against given email and password');
}

Session::flash('errors', $form->errors());

return redirect('/login');