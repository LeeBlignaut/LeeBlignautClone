<?php
require './Datahandler.php';

class Login {
    
    private $id;
    private $user;
    private $pass;
    
    function __construct($user, $pass,$id =0) {
        $this->id = $id;
        $this->user = $user;
        $this->pass = $pass;
    }

    function getId() {
        return $this->id;
    }

        function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }


    function InsertLogin(){
       
        
       $connection = new DataHandler('smart_storedb');
       $connection->connect();
       $x = $connection->InsertLogin($this);
       return $x; 
         
                
    }
    
    function Login()
    {
         $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
      $count =  $connection->Login($this->user, $this->pass);
      
      if ($count == 1) 
          {
          return True;
      }
     else
     {
         return False;
     }
       
       
    }
    
}
