<?php

function StickyText($btnName,$ControlName) 
        {
    if (isset($_POST[$btnName])) 
        {
        echo $_POST[$ControlName];
    }
}

