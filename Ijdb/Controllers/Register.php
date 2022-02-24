<?php
namespace Ijdb\Controllers;
class Register
{
     private $usersTable;
     public function __construct($usersTable)
     {
         $this->usersTable = $usersTable;
     }
     
     public function validateRegistration($account) { //Registration validation
        $errors = [];
        if ($account['email'] == '') {
            $errors[] = 'You must enter a valid email address';
        }

        if ($account['password'] == '' || strlen($account['password']) < 8) {
            $errors[] = 'You must enter a 8 characters long password ';
        }
        return $errors;
    }

    public function registrationForm($errors=[]){ //Display registration form

        $account = $_POST['account'] ?? [];
        return [
            'template' => 'register.html.php',
            'variables' => [
                'errors' => $errors,
                'account' => $account
            ],
            'title' => 'Create an account'
        ];
    }

    public function registrationSubmit(){ //Submit registration form
    
        $account = $_POST['account'];
        $errors = $this->validateRegistration($account);

        if (count($errors) == 0){
            $account['password'] = password_hash($account['password'],PASSWORD_DEFAULT);
            $this->usersTable->insert($account);
            header('Location: /registration/success');
        }
        else{
            return  $this->registrationForm($errors);
        }
    }

    public function registrationSuccess(){
        return ['template' => 'registersuccess.html.php',
            'variables' => [],
            'title' => 'Registration Successful'];
    }

}
