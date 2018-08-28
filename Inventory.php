<?php


class Inventory {
 
        private $id;
        private $amount;
        
        function __construct( $amount,$id=0) {
            $this->id = $id;
            $this->amount = $amount;
        }

        function getId() {
            return $this->id;
        }

        function getAmount() {
            return $this->amount;
        }

        function setAmount($amount) {
            $this->amount = $amount;
        }


        function InsertInventory()
        {
            
        }
}
