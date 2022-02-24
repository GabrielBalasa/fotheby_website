<?php
    namespace Ijdb\Controllers;
    use \Datetime;
    use Ijdb\Controllers\Authentication;
    class Item
    {
        private $itemsTable;
        private $categoriesTable;
        private $auctionsTable;
        private $authentication;

        public function __construct($itemsTable, $categoriesTable, $auctionsTable, $usersTable, $authentication){
            $this->itemsTable = $itemsTable;
            $this->categoriesTable = $categoriesTable;
            $this->auctionsTable = $auctionsTable;
            $this->usersTable = $usersTable;
            $this->authentication = $authentication;
        }

        public function listByCategory(){ // List active items by category
            $category = $this->categoriesTable->findOne('id', $_REQUEST['id']);
            $categories = $this->categoriesTable->findAll();
            $artists = $this->itemsTable->findDistinct('artist');
            $items = $this->itemsTable->findTwo('category_id', $_REQUEST['id'], 'status', 1);
            return [ 'template' => 'itemlist.html.php',
                'title' => 'Items by Category',
                'variables' => [
                    'items' => $items,
                    'category' => $category,
                    'categories' => $categories,
                    'artists' => $artists
                ]
            ];
        }
        
        public function listAll(){ // List active items by auction
            $categories = $this->categoriesTable->findAll();
            $items = $this->itemsTable->find('status', 1);
            $artists = $this->itemsTable->findDistinct('artist');
            return [ 'template' => 'itemlist.html.php',
                'title' => 'Items by Category',
                'variables' => [
                    'items' => $items,
                    'categories' => $categories,
                    'artists' => $artists
                ]
            ];
        }
        
        public function listByAuction(){ // List active items by auction
            $categories = $this->categoriesTable->findAll();
            $auctions = $this->auctionsTable->findAll();
            $artists = $this->itemsTable->findDistinct('artist');
            $auction = $this->auctionsTable->findOne('id', $_REQUEST['id']);
            $items = $this->itemsTable->findTwo('auction_id', $_REQUEST['id'], 'status', 1);
            return [ 'template' => 'itemlist.html.php',
                'title' => 'Items by Category',
                'variables' => [
                    'items' => $items,
                    'auctions' => $auctions,
                    'auction' => $auction,
                    'artists' => $artists,
                    'categories' => $categories
                ]
            ];
        }
        
        public function showItem(){ // List active items by auction
            $categories = $this->categoriesTable->findAll();
            $item = $this->itemsTable->findTwo('id', $_REQUEST['id'], 'status', 1)[0];
            return [ 'template' => 'itempage.html.php',
                'title' => 'Items by Category',
                'variables' => [
                    'item' => $item,
                    'categories' => $categories,
                ]
            ];
        }
        
        public function managePending(){ // List all the pending items
        
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }  
            $categories = $this->categoriesTable->findAll();
            $items = $this->itemsTable->find('status', 0);
            return [ 'template' => 'managependingitems.html.php',
                'title' => 'Pending items',
                'variables' => [
                     'items' => $items,
                     'categories' => $categories,
                     'user' => $user
                ]
            ];
        }

        public function manageActive(){ // List all the active items
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }  
            $categories = $this->categoriesTable->findAll();
            $items = $this->itemsTable->find('status', 1);
            return [ 'template' => 'manageactiveitems.html.php',
                'title' => 'Active items',
                'variables' => [
                     'items' => $items,
                     'categories' => $categories,
                     'user' => $user
                ]
            ];
        }

        public function manageSold(){ // List all the archived items items
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }
            $categories = $this->categoriesTable->findAll();
            $items = $this->itemsTable->find('status', 2);
            return [ 'template' => 'managesolditems.html.php',
                'title' => 'Active items',
                'variables' => [
                     'items' => $items,
                     'categories' => $categories,
                     'user' => $user
                ]
            ];
        }

        public function editSubmit(){ //Edit an item
            $user = $this->authentication->getUser();
            
            if (isset($_GET['id'])) {
                $item = $this->itemsTable->find('id', $_GET['id'])[0];
                if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }
            }
           
            $target_dir = '../public/uploads/';
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['image']['tmp_name']);
            if($check !== false) {
                $uploadOk = 1;
              } else {
                $uploadOk = 0;
              }
    
              // Allow certain file formats
            if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif' ) {
                echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo 'Sorry, your file was not uploaded.';
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    } else {
                    echo 'Sorry, there was an error uploading your file.';
                    }
                }
            
            $item = $_POST['item'];
            $item['image']  = htmlspecialchars( basename( $_FILES['image']['name']));
            $user->addItem($item);
            header('location: /items/manage/active');
        }

        public function editForm(){ // Edit an item form
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }
            
            $categories = $this->categoriesTable->findAll();
            $auctions = $this->auctionsTable->findAll();
            if (isset($_GET['id'])){
                $result = $this->itemsTable->find('id', $_GET['id']);
                $item = $result[0];
            }
            return [
                'template' => 'edititem.html.php',
                'title' => 'Edit item',
                'variables' => [ 'item' => $item ?? null,
                    'categories' => $categories,
                    'user' => $user,
                    'auctions' => $auctions
                ]
            ];
        }

        public function delete(){ // Delete function
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
          
            
            $item = $this->itemsTable->findOne('id',$_POST['id']);
            $this->itemsTable->delete($item->id);
            header('location: /items/manage/active');
        }
        
        public function acceptPending(){ // Accept from pending function
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $item = $_POST['item'];
            $this->itemsTable->update($item);
            header('location: /items/manage/pending');
        }

        public function markAsSold(){ // Mark as sold function
            $user = $this->authentication->getUser(); 
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $item = $_POST['item'];
            $this->itemsTable->update($item);
            header('location: /items/manage/active');
        }
        
        public function markAsUnsold(){ // Mark as unsold function
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $item = $_POST['item'];
            $this->itemsTable->update($item);
            header('location: /items/manage/sold');
        }
    }