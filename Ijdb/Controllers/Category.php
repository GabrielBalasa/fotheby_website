<?php
    namespace Ijdb\Controllers;
    class Category
    {
        private $categoriesTable;
        private $authentication;

        public function __construct($categoriesTable, $authentication)
        {
            $this->categoriesTable = $categoriesTable;
            $this->authentication = $authentication;
        }

        public function list(){ // List all categories
            $user = $this->authentication->getUser();
            $categories = $this->categoriesTable->findAll();
            return [
                'template' => 'categorylist.html.php',
                'title' => 'Manage categories' ,
                'variables' => [
                    'categories' => $categories,
                    'user' => $user
                ]
            ];
        }
        
        public function manage(){ // Manage all the categories
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }  
            $categories = $this->categoriesTable->findAll();
            return [ 'template' => 'managecategories.html.php',
                'title' => 'Categories',
                'variables' => [
                     'categories' => $categories,
                     'user' => $user
                ]
            ];
        }


        public function delete(){ // Delete a category
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $category = $this->categoriesTable->findOne('id', $_POST['id']);
            $this->categoriesTable->delete($category->id);
            header('location:  /categories/manage');
        }

        public function editForm(){ //Edit/New a category
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            if (isset($_GET['id'])){
                $category = $this->categoriesTable->findOne('id', $_GET['id']);
            }
            return [
                'template' => 'editcategory.html.php',
                'title' => 'Edit categories',
                'variables' => [
                    'category' => $category ?? null,
                    'user' => $user
                ]
            ];
        }

        public function editSubmit(){ // Submit edit/new category
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $category = $_POST['category'];
         
            $this->categoriesTable->save($category);
            header('location: /categories/manage');
        }
    }