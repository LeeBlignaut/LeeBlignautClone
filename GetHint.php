<?php
require './DataHandler.php';

$dataHandler = new Datahandler('smart_storedb');
$hintData = $dataHandler->ReturnNames();

$hintSent = $_REQUEST["hint"];
$hintReqeust = "";

if ($hintSent !== "") {
    $hintSent = strtolower($hintSent);
    $length = strlen($hintSent);
    
    foreach ($hintData as $hintValue) {
        if (stristr($hintSent, substr($hintValue, 0,$length))) {
            if ($hintReqeust === "") {
                $hintReqeust = $hintValue;
            }
            else{
                $hintReqeust .= '<a href="single.php>'.$hintValue.' </a>';
            }
        }
    }
    
}

echo $hintReqeust == ""? "No items matching search results" : $hintReqeust;