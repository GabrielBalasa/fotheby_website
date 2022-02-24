<?php
    namespace Ijdb;
    class Routes implements \SE3\Routes 
    {
        private $usersTable;
        private $itemsTable;
        private $bookingsTable;
        private $categoriesTable;
        private $auctionsTable;
        private $authentication;
        

        public function __construct(){
            require '../connection.php';
            $this->itemsTable = new \SE3\DatabaseTable($pdo, 'items', 'id', '\Ijdb\Entity\Item', [&$this->categoriesTable, &$this->auctionsTable, &$this->usersTable]);
            $this->categoriesTable = new \SE3\DatabaseTable($pdo, 'categories', 'id');
            $this->bookingsTable = new \SE3\DatabaseTable($pdo, 'bookings', 'id', '\Ijdb\Entity\Booking', [&$this->usersTable]);
            $this->usersTable = new \SE3\DatabaseTable($pdo, 'users', 'id', '\Ijdb\Entity\User', [&$this->itemsTable, &$this->bookingsTable, &$this->auctionsTable]);
            $this->auctionsTable = new \SE3\DatabaseTable($pdo, 'auctions', 'id', '\Ijdb\Entity\Auction', [&$this->usersTable]);
            $this->authentication = new \SE3\Authentication($this->usersTable, 'email', 'password');
           
        }
        
        public function checkRole($role): bool{
            $user = $this->authentication->getUser();
            if ($user && $user->getRole($role)){
                return true;
            } else {
                return false;
            }
        }

        public function getRoutes(): array{
            $itemsController = new \Ijdb\Controllers\Item($this->itemsTable, $this->categoriesTable, $this->auctionsTable, $this->usersTable, $this->authentication);
            $categoryController = new \Ijdb\Controllers\Category($this->categoriesTable, $this->authentication);
            $bookingController = new \Ijdb\Controllers\Booking($this->bookingsTable, $this->usersTable, $this->authentication);
            $userController = new \Ijdb\Controllers\User($this->authentication, $this->usersTable);
            $auctionController = new \Ijdb\Controllers\Auction($this->auctionsTable, $this->categoriesTable, $this->authentication);
            $registerController = new \Ijdb\Controllers\Register($this->usersTable);
            $loginController = new \Ijdb\Controllers\Authentication($this->authentication);

            $routes= [
                '' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'home'
                    ]
                ],

                'home' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'home'
                    ]
                ],

                'about' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'aboutPage'
                    ]
                ],
                
                'auctions' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'listActive'
                    ],
                ],
                
                'faq' => [
                    'GET' => [
                        'controller' => $bookingController,
                        'function' => 'faq'
                    ]
                ],
                
                'items' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'listAll'
                    ]
                ],

                'items/list/category' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'listByCategory'
                    ]
                ],

                'items/manage/sold' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'manageSold'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'items/manage/archived/category' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'manageSoldCategory'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'items/manage/active' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'manageActive'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN 
                ],
                
                'items/manage/pending' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'managePending'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN 
                ],

                'items/manage/active/category' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'manageActiveCategory'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'item/page' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'showItem'
                    ],
                ],

                'item/save' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'editForm'
                    ],
                    'POST' => [
                        'controller' => $itemsController,
                        'function' => 'editSubmit'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'item/accept' => [
                    'POST' => [
                        'controller' => $itemsController,
                        'function' => 'acceptPending'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'item/delete' => [
                    'POST' => [
                        'controller' => $itemsController,
                        'function' => 'delete'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'item/sold' => [
                    'POST' => [
                        'controller' => $itemsController,
                        'function' => 'markAsSold'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'item/unsold' => [
                    'POST' => [
                        'controller' => $itemsController,
                        'function' => 'markAsUnsold'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'categories/list' => [
                    'GET' => [
                            'controller' => $categoryController,
                            'function' => 'list'
                    ],
                    'login' => true
                ],
                
                'categories/manage' => [
                    'GET' => [
                            'controller' => $categoryController,
                            'function' => 'manage'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'category/save' => [
                    'GET' => [
                        'controller' => $categoryController,
                        'function' => 'editForm'
                    ],
                    'POST' => [
                        'controller' => $categoryController,
                        'function' => 'editSubmit'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'category/delete' => [
                    'POST' => [
                        'controller' => $categoryController,
                        'function' => 'delete'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'accounts/register' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'registrationForm'
                    ],
                    'POST' => [
                        'controller' => $userController,
                        'function' => 'registerUser'
                    ],
                        'login' => true,
                        'role' => \Ijdb\Entity\User::SUPERADMIN
                ],

                'accounts/admin/manage' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'manageAdmins'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::SUPERADMIN
                ],
                
                'accounts/customer/manage' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'manageActiveCustomers'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::SUPERADMIN
                ],
                
                'accounts/customer/pending' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'managePendingCustomers'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::SUPERADMIN
                ],

                'account/delete' => [
                    'POST' => [
                        'controller' => $userController,
                        'function' => 'delete'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::SUPERADMIN
                ],
                
                'account/save' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'registrationForm'
                    ],
                    'POST' => [
                        'controller' => $userController,
                        'function' => 'registerUser'
                    ]
                ],
                
                'account/approve' => [
                    'POST' => [
                        'controller' => $userController,
                        'function' => 'approve'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::SUPERADMIN
                ],
                
                'create-account/success' => [
                    'GET' => [
                        'controller' => $userController,
                        'function' => 'registrationSuccess'
                    ]
                ],

                'evaluations/manage/pending' => [
                    'GET' =>  [
                        'controller' => $bookingController,
                        'function' => 'managePending'
                ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                    ],

                'evaluations/manage/complete' => [
                    'GET' => [
                        'controller' => $bookingController,
                        'function' => 'manageComplete'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'evaluation/book' => [
                    'GET' => [
                        'controller' => $bookingController,
                        'function' => 'bookForm'
                    ],
                    'POST' => [
                        'controller' => $bookingController,
                        'function' => 'submitBooking'
                    ],
                ],
                
                'evaluation/close' => [
                    'POST' => [
                        'controller' => $bookingController,
                        'function' => 'close'
                    ],
                ],
                
                'evaluation/delete' => [
                    'POST' => [
                        'controller' => $bookingController,
                        'function' => 'delete'
                    ],
                ],

                'login/error' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'error'
                    ]
                ],

                'login' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'loginForm'
                    ],
                    'POST' => [
                        'controller' => $loginController,
                        'function' => 'processLogin'
                    ]
                ],

                'login/success' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'success'
                    ],
                    'login' => true
                ],

                'logout' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'logout'
                    ]
                ],
                'login/error' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'error'
                    ]
                ],

                'login' => [
                    'GET' => [
                        'controller' => $loginController,
                        'function' => 'loginForm'
                    ],
                    'POST' => [
                        'controller' => $loginController,
                        'function' => 'processLogin'
                    ]
                    ],
                'register' => [
                    'GET' => [
                        'controller' => $registerController,
                        'function' => 'registrationForm'
                    ],
                    'POST' => [
                        'controller' => $registerController,
                        'function' => 'registrationSubmit'
                    ]
                    ],
                'registration/success' => [
                    'GET' => [
                        'controller' => $registerController,
                        'function' => 'registrationSuccess'
                    ],
                ],

                'auction/active' => [
                    'GET' =>  [
                        'controller' => $auctionController,
                        'function' => 'listActive'
                    ]
                ],

                'auction/closed' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'listClosed'
                    ]
                ],
                
                'auctions/manage/active' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'manageActive'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'auctions/manage/closed' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'manageClosed'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'auction/save' => [
                    'GET' => [
                        'controller' => $auctionController,
                        'function' => 'auctionForm'
                    ],
                    'POST' => [
                        'controller' => $auctionController,
                        'function' => 'submitAuction'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],

                'auction/delete' => [
                    'POST' => [
                        'controller' => $auctionController,
                        'function' => 'delete'
                    ],
                    'login' => true,
                    'role' => \Ijdb\Entity\User::ADMIN
                ],
                
                'auction/items' => [
                    'GET' => [
                        'controller' => $itemsController,
                        'function' => 'listByAuction'
                    ]
                ],
            ];
            return $routes;
        }

        public function getLayoutVariables(){
            return [
                'loggedIn' => $this->authentication->loggedIn(),
                'categories' => $this->categoriesTable->findAll()
            ];
        }

        public function authentication(): \SE3\Authentication {
            return $this->authentication;
        }
    }
?>