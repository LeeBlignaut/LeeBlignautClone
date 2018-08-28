<?php

class DataHandler {
    
    private $hostName;
    private $userName;
    private $password;
    private $databaseName;
    private $link;
    
    function __construct($databaseName,$hostName ="localhost", $userName="root", $password="") {
        $this->hostName = $hostName;
        $this->userName = $userName;
        $this->password = $password;
        $this->databaseName = $databaseName;
        $this->Connect();
        
    }

    function Connect()
    {
        $this->link = new mysqli($this->hostName,  $this->userName,  $this->password,  $this->databaseName);
    }
    
    function InsertLogin(Login $login)
    {
      
    
       $qeury = "INSERT INTO `admin`(`Admin_User`, "
               . "`Admin_Pass`) "               
               . "VALUES ('".$login->getUser()."',"
               . "'".$login->getPass()."')";
       
       $x = mysqli_query($this->link, $qeury);
       
      
       
       
       return $x;
    }
    
    
    
    function Login($user,$pass){
        
        $sql = "SELECT Admin_ID FROM Admin WHERE Admin_User = '".$user."' and Admin_Pass = '".$pass."'";
      $result = mysqli_query($this->link,$sql);
     
      $count = mysqli_num_rows($result);
      
      
      return $count;
    
   
      
    }
    
    
    function InsertProduct(Product $product)
    {
        $query ="INSERT INTO `product`(`Product_Name`,"
                . "`Product_Price`, `Product_Brand`,"
                . "`Product_Model`, `Product_Description`,"
                . "`Product_Location`) "
                . "VALUES ('".$product->getName()."',"
                ."'".$product->getPrice()."',"
                ."'".$product->getBrand()."',"
                ."'".$product->getModel()."',"
                ."'".$product->getDescription()."',"
                ."'".$product->getLocation()."')";
        
        $x = mysqli_query($this->link, $query);
        
        
        
         return $x;
    }
    
    
    
    function SelectAll()
    {
        $query = "SELECT * FROM `product` WHERE 1";
            $result = mysqli_query($this->link,$query);

           
          
          
        

        
        
        return $result;
         
    
    
    }
    
    function InsertInventory($id,$amount)
    {
        $qeury = "INSERT INTO `inventory`(`Inv_ID`, "
               . "`Amount`) "               
               . "VALUES ('".$id."',"
               . "'".$amount."')";
       
       $y = mysqli_query($this->link, $qeury);
        
        
         return $y;
    }
    
    
      function SelectDataByID($id)
    {
    
        
        $qeury = "SELECT * FROM `product` WHERE `Product_ID` = ".$id;
        
        $result = mysqli_query($this->link, $qeury);
        $rows= $result->fetch_all(MYSQLI_ASSOC);
        
        return $rows;
    }
    
    function SelectInventoryByID($id)
    {
    
        
        $qeury = "SELECT * FROM `inventory` WHERE `Inv_ID` = ".$id;
        
        $result = mysqli_query($this->link, $qeury);
        $rows= $result->fetch_all(MYSQLI_ASSOC);
        
        return $rows;
    }
    
    
 function ReturnNames(){
        $qeury = "SELECT `Product_Name` FROM `product`";
        
        $result = mysqli_query($this->link, $qeury);
        
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        
        $namesArray = array();
        foreach ($rows as $value) {
            array_push($namesArray, $value["Product_Name"]);
        }
        
        return $namesArray;
    }
    
    
    
    
    function InsertEmail($email)
    {
      
    
       $qeury = "INSERT INTO `User`(`Email_Addr`) "               
               . "VALUES ('".$email."')";
       
       $x = mysqli_query($this->link, $qeury);
       
      
       
       
       return $x;
    }
    
    
    function UpdateProductByID($id,Product $product){
        $qeury = "UPDATE `product` SET `Product_Name`='".$product->getName()."',"
                . "`Product_Price`='".$product->getPrice()."',"
                . "`Product_Brand`= '".$product->getBrand()."', "
                . "`Product_Model`= '".$product->getModel()."', "
                . "`Product_Description`= '".$product->getDescription()."',"
                . "`Product_Location`= '".$product->getLocation()."' "
                . "WHERE `Product_ID` = ".$id;
        
        
       mysqli_query($this->link, $qeury);
    }
    
    function UpdateInventory($id,$amount)
    {
        $qeury = "UPDATE `inventory` SET `Amount`='".$amount."'"
                . "WHERE `Inv_ID` = ".$id;
       
      
       mysqli_query($this->link, $qeury);
    }
    
      function DeleteProductByID($id){
        $qOne = "DELETE FROM `product` WHERE `Product_ID` = ".$id;
       
       mysqli_query($this->link, $qOne);
      
       
       
       
       
    }
    
     function DeleteInventoryByID($id){
      
      
       
        $qtwo = "DELETE FROM `inventory` WHERE `Inv_ID` = ".$id;
        
        mysqli_query($this->link, $qtwo);
       
       
    }
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           