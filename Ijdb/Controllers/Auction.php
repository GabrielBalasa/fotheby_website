<?php
    namespace Ijdb\Controllers;
    use DateTime;
    class Auction
    {
        private $auctionsTable;
        private $categoriesTable;
        private $authentication;

        public function __construct($auctionsTable, $categoriesTable, $authentication)
        {
            $this->auctionsTable = $auctionsTable;
            $this->categoriesTable = $categoriesTable;
            $this->authentication = $authentication;
        }

        public function home(){ //Display current and upcoming auctions on home page

            $today = new DateTime();
            $today = $today->format('Y-m-d');

            $currentAuctions = $this->auctionsTable->orderCurrent('start_date', $today, 'end_date', $today);
            $upcomingAuctions = $this->auctionsTable->orderUpcoming('start_date', $today);
            return [
                'template' => 'home.html.php',
                'title' => 'Home',
                'variables' => [
                    'currentAuctions' => $currentAuctions,
                    'upcomingAuctions' => $upcomingAuctions
                ]
            ];
        }
        
        public function aboutPage(){ //Display "About" page
            $categories = $this->categoriesTable->findAll();
            return [
                'template' => 'about.html.php',
                'title' => 'Home',
                'variables' => [
                    'categories' => $categories
                ]
            ];
        }

        public function listActive(){ // List active auctions for admin approval
        
            $today = new DateTime();
            $today = $today->format('Y-m-d');
            $categories = $this->categoriesTable->findAll();
            $auctions = $this->auctionsTable->orderCurrent('start_date', $today, 'end_date', $today);
            $cities = $this->auctionsTable->findDistinct('city');
            $title = 'Auctions';
            return [
                'template' => 'activeauctions.html.php',
                'title' => $title,
                'variables' => [
                    'auctions' => $auctions,
                    'categories' => $categories,
                    'cities' => $cities
                ]
            ];
        }

        public function listClosed(){ // List closed auctions list
        
            $today = new DateTime();
            $today = $today->format('Y-m-d');
        
            $auctions = $this->auctionsTable->orderPast('end_date', $today);
            $title = 'Closed Auctions';
            return [ 
                'template' => 'closedauctions.html.php',
                'title' => $title,
                'variables' => [
                    'auctions' => $auctions
                ]
            ];
        }
        
        public function manageActive(){ //Manage active auctions
        
            $today = new DateTime();
            $today = $today->format('Y-m-d');
            
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $auctions = $this->auctionsTable->orderCurrentAndUpcoming('end_date', $today);
            $title = 'Active auctions';
            return [ 
                'template' => 'manageactiveauctions.html.php',
                'title' => $title,
                'variables' => [
                    'auctions' => $auctions,
                    'user' => $user
                ]
            ];
        }
        
        public function manageClosed(){ //Manage closed auctions
        
            $today = new DateTime();
            $today = $today->format('Y-m-d');
        
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $auctions = $this->auctionsTable->orderPast('end_date', $today);
            $title = 'Completed auctions';
            return [ 
                'template' => 'manageclosedauctions.html.php',
                'title' => $title,
                'variables' => [
                    'auctions' => $auctions,
                    'user' => $user
                ]
            ];
        }

        public function delete(){ // Delete auctions function
            $user = $this->authentication->getUser();
            $auction = $this->auctionsTable->findOne('id', $_POST['id']);
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $this->auctionsTable->delete($auction->id);
            header('location: /auctions/manage/active');
        }

        public function auctionForm(){ //Display auctions form
        
            $user = $this->authentication->getUser();
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            if (isset($_GET['id'])){
                $result = $this->auctionsTable->findOne('id', $_GET['id']);
                $auction = $result;
            }
            return [
                'template' => 'editauction.html.php',
                'title' => 'Auction',
                'variables' => [ 'auction' => $auction ?? null,
                    'user' => $user,
                ]
            ];
        }

        public function submitAuction(){ //Submit new auction
            $user = $this->authentication->getUser();
            $auction = $_POST['auction'];
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $this->auctionsTable->save($auction);
            header('location: /auctions/manage/active');
        }
    }