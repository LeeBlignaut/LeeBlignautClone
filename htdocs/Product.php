<?php

require './DataHandler.php';
class Product {
    
    private $id;
    private $name;
    private $price;
    private $brand;
    private $model;
    private $description;
    private $location;
    
    function __construct($name, $price, $brand, $model, $description, $location,$id=0) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
        $this->model = $model;
        $this->description = $description;
        $this->location = $location;
    }

            function getId() {
        return $this->id;
    }

        function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getBrand() {
        return $this->brand;
    }

    function getModel() {
        return $this->model;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }

    function setModel($model) {
        $this->model = $model;
    }
    
    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function getLocation() {
        return $this->location;
    }

    function setLocation($location) {
        $this->location = $location;
    }

        
    public function __toString() {
        
    }

    function InsertProduct()
    {
        $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $x = $connection->InsertProduct($this);
       
       return $x;
       
    }
    
     function SelectAll()
    {
        $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $result = $connection->SelectAll();
       
       return $result;
       
       
    }
    
    function InsertInventory($id,$amount)
    {
         $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $y = $connection->InsertInventory($id, $amount);
       
       return $y;
    }
    
    
    function SelectByID($id){
         $connection = new DataHandler('smart_storedb');
        $connection->connect();
        $rows = $connection->SelectDataByID($id);
        
       
            $product = new Product($rows[0]['Product_Name'],
                    $rows[0]['Product_Price'], 
                    $rows[0]['Product_Brand'], 
                    $rows[0]['Product_Model'], 
                    $rows[0]['Product_Description'], 
                    $rows[0]['Product_Location'],
                    $rows[0]['Product_ID']);            
            
            
           
            
         
            return $product;
    }
    
    function SelectInventoryByID($id){
         $connection = new DataHandler('smart_storedb');
        $connection->connect();
        $rows = $connection->SelectInventoryByID($id);
        
       
            $inventory = new Inventory($rows[0]['Amount'],
                    $rows[0]['Inv_ID']); 
                             
            
            
           
            
         
            return $inventory;
    }
    
    function InsertEmail($email)
    {
        
        $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $x = $connection->InsertEmail($email);
       
       return $x;
    }
    
    
    function UpdateProduct($id)
    {
        $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $connection->UpdateProductByID($id,$this);
      
    }
    
    function UpdateInventory($id,$amount)
    {
         $connection = new DataHandler('smart_storedb');
       $connection->connect();
       
       $connection->UpdateInventory($id,$amount);
       
      
    }
    
     function DeleteProductByID($id){
          
       $connection = new DataHandler('smart_storedb');
       $connection->connect();
       $connection->DeleteProductByID($id);
    }
    
     function DeleteInventoryByID($id){
          
       $connection = new DataHandler('smart_storedb');
       $connection->connect();
       $connection->DeleteInventoryByID($id);
    }
    
    
    
}
