<?php


function UploadFile($fileName,$fileNameNew) 
 {
    
    $file = $_FILES[$fileName];
    
    $fileNameVal = $file['name'];
    $fileErrorVal = $file['error'];
    $fileSizeVal = $file['size'];
    $fileLocationVal = $file['tmp_name'];
    
    $fileExt = explode('.', $fileNameVal);
    $fileExt = strtolower(end($fileExt));
    
   $allowedArray = ['jpg','jpeg','png','bmp'];
    
   $fileNameNew = $fileNameNew.".".$fileExt;
    if($fileErrorVal == 0)
    {
    if (in_array($fileExt, $allowedArray)) 
            {
        if ($fileSizeVal <= ((1024*1024)*5))
            {
            $fileDestination = "./Product_Uploads/".$fileNameNew;
            move_uploaded_file($fileLocationVal, $fileDestination);
            return $fileDestination;
        }
        else
            {
            echo 'File over 2MB';
        }
    }
    else
        {
            echo 'Wrong file extension ' + $fileExt;
        }
        
    }
        else
        {
        echo 'Error';
        }
    
    
 }