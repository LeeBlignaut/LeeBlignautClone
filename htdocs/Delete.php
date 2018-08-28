<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php require './Product.php';
                    require './FileHandler.php';
                    require './Inventory.php';?>
            
            <?php 
                         session_start();
        
            $id = $_GET['id'];
        $product = new Product('', '','' , '', '', '');
        $inventory = new Inventory('','');

        $product = $product->SelectByID($id);
        $inventory = $product->SelectInventoryByID($id);
                    ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       $id = $_GET['id'];
        $product = new Product('', '','' , '', '', '');
        
            
            $product->DeleteInventoryByID($id);
            $product->DeleteProductByID($id);
            header("Location: index.php");
        ?>
    </body>
</html>
