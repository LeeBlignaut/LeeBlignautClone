
function StringOnlyNotEmpty(elementID,elementErrorID){
    element = document.getElementById(elementID);
    elementError = document.getElementById(elementErrorID);
    
    value = element.value;
    expression = /^[A-Za-z]+$/;
    
    if ((value.match(expression))&&(value != "")){
        
        elementError.innerHTML = "";
        element.style = "border: 2px solid white;";
    }
    else{
        element.style = "border: 2px solid red;";
        elementError.innerHTML = "Cannot be empty or contain numbers";
        elementError.style = "color: red;";
    }
}



function IntegerOnlyNotEmpty(elementID,elementErrorID){
    element = document.getElementById(elementID);
    elementError = document.getElementById(elementErrorID);
    
    value = element.value;
    expression = /^[0-9]+$/;
    
    if ((value.match(expression))&&(value != "")){
        
        elementError.innerHTML = "";
        element.style = "border: 2px solid white;";
    }
    else{
        element.style = "border: 2px solid red;";
        elementError.innerHTML = "Cannot be empty or contain letters";
        elementError.style = "color: red;";
    }
}

function DropdownDefault(elementID,elementErrorID,defualtValue){
    element = document.getElementById(elementID);
    elementError = document.getElementById(elementErrorID);
    
    value = element.value;
    
    if (value != defualtValue){
        
        elementError.innerHTML = "";
        element.style = "border: 2px solid white;";
    }
    else{
        element.style = "border: 2px solid red;";
        elementError.innerHTML = "Select Valid Value";
        elementError.style = "color: red;";
    }
}



function StringAndIntegerNotEmpty(elementID,elementErrorID){
    element = document.getElementById(elementID);
    elementError = document.getElementById(elementErrorID);
    
    value = element.value;
    expression =  /^[a-zA-Z0-9]+(\s+[a-zA-Z0-9]+)?$/; // Expression used to check strings and integers aswell as spaces
    
    if ((value.match(expression))&&(value != "")){
        
        elementError.innerHTML = "";
        element.style = "border: 2px solid white;";
    }
    else{
        element.style = "border: 2px solid red;";
        elementError.innerHTML = "Cannot be empty or contain symbols";
        elementError.style = "color: red;";
    }
}