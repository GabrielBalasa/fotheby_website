<?php
    namespace Ijdb\Controllers;
    class User
    {
        private $authentication;
        private $usersTable;

        public function __construct(\SE3\Authentication $authentication, $usersTable){
            $this->authentication = $authentication;
            $this->usersTable = $usersTable;
        }

        public function validateRegistration($account) { //Initiate errors to validate registration 
            $errors = [];
            if ($account['email'] == '') {
                $errors[] = 'You must enter an email address';
            }

            if ($account['password'] == '') {
                $errors[] = 'You must enter a password';
            }
            return $errors;
        }

        public function registrationForm($errors=[]){ //Display registration form
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            
            $account = $_POST['account'] ?? [];
            return [
                'template' => 'editaccount.html.php',
                'variables' => [
                    'user' => $user,
                    'errors' => $errors,
                    'account' => $account
                ],
                'title' => 'Create an account'
            ];
        }

        public function registerUser(){ //Register user if there are no errors
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }

            $account = $_POST['account'];
            $errors = $this->validateRegistration($account);

            if (count($errors) == 0){
                $account['password'] = password_hash($account['password'],PASSWORD_DEFAULT);
                $this->usersTable->save($account);
                header('Location: /accounts/admin/manage');
            }
            else{
                return  $this->registrationForm($errors);
            }
        }

    
        public function manageAdmins(){ //Manage admin accounts
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            
            $accounts = $this->usersTable->find('role', '2');
            return [ 'template' => 'manageadminaccounts.html.php',
                'title' => 'Manage admin accounts',
                'variables' => [
                    'accounts' => $accounts,
                    'user' => $user
                ]
            ];
        }
        
        public function manageActiveCustomers(){ //Manage customer accounts
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            
            $accounts = $this->usersTable->findTwo('role', '1', 'status', '1');
            return [ 'template' => 'managecustomeractiveaccounts.html.php',
                'title' => 'Manage Customer Accounts',
                'variables' => [
                    'accounts' => $accounts,
                    'user' => $user
                ]
            ];
        }
        
        public function managePendingCustomers(){ //Manage customer accounts
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            
            $accounts = $this->usersTable->findTwo('role', '1', 'status', '0');
            return [ 'template' => 'managecustomerpendingaccounts.html.php',
                'title' => 'Manage Pending Customer Accounts',
                'variables' => [
                    'accounts' => $accounts,
                    'user' => $user
                ]
            ];
        }
        
        public function approve(){ // Accept from pending function
            $user = $this->authentication->getUser();
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $account = $_POST['account'];
            
            $this->usersTable->update($account);
            header('location: /accounts/customer/pending');
        }

        public function delete(){ //Delete account
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role < 4){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            
            $account = $this->usersTable->findOne('id', $_POST['id']);
             $this->usersTable->delete($account->id);
            header('location: /accounts/admin/manage');
        }
    }