<?php

namespace http\forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password){

        if(! Validator::email($email)){
            $this->errors['email'] = "Please provide a valid email.";
        }

        if(! Validator::string($password)){
            $this->errors['password'] = "Please provide password.";
        }

        return empty($this->errors);

    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;
    }

}