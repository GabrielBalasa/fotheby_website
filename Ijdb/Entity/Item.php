<?php
    namespace Ijdb\Entity;
    class Item 
    {
        public $categoriesTable;
        public $auctionsTable;
        public $usersTable;

        public function __construct(\SE3\DatabaseTable $categoriesTable, $auctionsTable, $usersTable) {
            $this->categoriesTable = $categoriesTable;
            $this->auctionsTable = $auctionsTable;
            $this->usersTable = $usersTable;
        }

        public function getCategory(){ //Get categories details
            return $this->categoriesTable->findOne('id', $this->category_id);
        }
        
        public function getAuction(){ //Get auctions details
           return $this->auctionsTable->findOne('id', $this->auction_id);
        }
        
        public function getUser(){ //Get user details
            return $this->usersTable->findOne('id', $this->user_id);
        }
    }