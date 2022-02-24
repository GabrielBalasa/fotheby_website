<?php
    namespace Ijdb\Controllers;
    class Booking 
    {
        private $bookingsTable;
        private $usersTable;
        private $authentication;

        public function __construct($bookingsTable, $usersTable, $authentication)
        {
            $this->bookingsTable = $bookingsTable;
            $this->usersTable = $usersTable;
            $this->authentication = $authentication;
        }

        public function managePending(){ // List active bookings for admin approval
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }
            
            $bookings = $this->bookingsTable->find('status', 0);
            $title = 'bookings';
            return [ 
                'template' => 'managependingbookings.html.php',
                'title' => $title,
                'variables' => [
                    'bookings' => $bookings,
                    'user' => $user
                ]
            ];
        }

        public function manageComplete() { // List approved bookings
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
                }
            
            $bookings = $this->bookingsTable->find('status', 1);
            $title = 'Completed bookings';
            return [ 
                'template' => 'managecompletedbookings.html.php',
                'title' => $title,
                'variables' => [
                    'bookings' => $bookings,
                    'user' => $user
                ]
            ];
        }

        public function close(){ //Approve a booking
            $user = $this->authentication->getUser();
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }

            $booking = $_POST['booking'];
            $user->completeBooking($booking);
            header('location: /evaluations/manage/complete');
        }

        public function bookForm(){ //Display booking form
            return [
                'template' => 'book.html.php',
                'title' => 'Book',
                'variables' => []
            ];
        }

        public function submitBooking(){ //Submit a new booking
            $booking = $_POST['booking'];
            $this->bookingsTable->save($booking);
            return  [
                'template' => 'success.html.php',
                'title' => 'Success',
                'variables' => []
            ];
        }
        
        public function delete(){ // Delete function
            $user = $this->authentication->getUser();
            $booking = $this->bookingsTable->findOne('id', $_POST['id']);
            
            if($user === false || $user->role <= 1){
                echo '<h2>You do not have access to this page! Go to <a href="/home">Home Page</a>.</h2>';
                exit;
            }
            $this->bookingsTable->delete($booking->id);
            header('location: /evaluations/manage/complete');
        }
    }