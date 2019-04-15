<?php 

function checkEmpty($value){
    if($value == ""){
        return "* Required Field";
    }
    return "";
}

function checkDropDown($value, $default){
    if(isset($_REQUEST[$value]) && $_REQUEST[$value] == $default){
        return "Please Select an option";
    }else{
        return "";
    }
}





