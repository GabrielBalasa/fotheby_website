<?php
    namespace Ijdb\Entity;
    class User
    {
        const BUYER = 1;
        const ADMIN = 2;
        const SUPERADMIN = 4;
        private $itemsTable;
        private $bookingsTable;
        private $auctionsTable;

        public function __construct(\SE3\DatabaseTable $itemsTable, $bookingsTable, $auctionsTable)
        {
            $this->itemsTable = $itemsTable;
            $this->bookingsTable = $bookingsTable;
            $this->auctionsTable = $auctionsTable;
        }
        
        public function getRole($role){ //Check user roles
            return $this->role & $role;
        }

        public function addItem($item){ //Add new item
            $item['user_id'] = $this->id;
            $this->itemsTable->save($item);
        }

        public function completeBooking($booking){ //Approve booking
            $booking['user_id'] = $this->id;
            $this->bookingsTable->update($booking);
        }
    }