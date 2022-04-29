<?php

function alert($message,$color="success"){
    return "<p class='alert alert-$color'>$message</p>";
}

function redirect($page="index.php"){
    return die("<script>location.href='$page'</script>");
}

function showAlertMessage($alertKey){

    if(empty($_SESSION['alert'][$alertKey])){
        return  null;
    }

    $message = $_SESSION['alert'][$alertKey]['message'];
    $color = $_SESSION['alert'][$alertKey]['color'];
    unset($_SESSION["alert"][$alertKey]);

    return alert($message,$color);

}

function storeAlertMessage($key,$message,$color="success"){
    $_SESSION['alert'][$key]['message'] = $message;
    $_SESSION['alert'][$key]['color'] = $color;
}

function storeErrorMessage($key,$message){
    $_SESSION['error'][$key]= $message;
}

function showErrorMessage($key){
    if(empty($_SESSION['error'][$key])){
        return null;
    }

    $message = "<p class='text-danger small'>{$_SESSION['error'][$key]}</p>";
    unset($_SESSION['error'][$key]);

    return $message;
}

function old($key){
    if(empty($_POST[$key])){
        return null;
    }

    return $_POST[$key];
}

function contacts(){
    $sql = "SELECT * FROM contacts";
    $query = mysqli_query($GLOBALS['conn'],$sql);
    $rows = [];
    while ($row = mysqli_fetch_object($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function contact($id){
    $sql = "SELECT * FROM contacts WHERE id=$id";
    $query = mysqli_query($GLOBALS['conn'],$sql);
    return mysqli_fetch_object($query);
}

function contactCreate(){
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    //validation
    // required | min:3 | max:20 | char only

    if(empty($name)){
        storeErrorMessage("name","Name is empty");
    }else{
        if(strlen($name)<3){
            storeErrorMessage("name","Name is too short");
        }else{
            if(strlen($name)>20){
                storeErrorMessage("name","Name is too long");
            }else{
                if(!preg_match("/^[a-zA-Z ]*$/",$name)){
                    storeErrorMessage("name","Only allow char and space");
                }
            }
        }
    }


    if(empty($phone)){
        storeErrorMessage("phone","Phone is empty");
    }else{
        if(strlen($phone)<3){
            storeErrorMessage("phone","Phone is too short");
        }else{
            if(strlen($phone)>20){
                storeErrorMessage("phone","Phone is too long");
            }else{
                if(!preg_match("/^[0-9]*$/",$phone)){
                    storeErrorMessage("phone","Only allow Number");
                }
            }
        }
    }

//    print_r($_POST);

    if(!empty($_SESSION['error'])){
        return false;
    }

    $sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone')";
    return mysqli_query($GLOBALS['conn'],$sql);
}

function contactDelete(){
    $id = $_POST['id'];
    $sql = "delete from contacts where id=$id";
    return mysqli_query($GLOBALS['conn'],$sql);
}