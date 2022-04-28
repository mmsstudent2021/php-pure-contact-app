<?php

function alert($message,$color="success"){
    return "<p class='alert alert-$color'>$message</p>";
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
    $sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone')";
    return mysqli_query($GLOBALS['conn'],$sql);
}

function contactDelete(){
    $id = $_POST['id'];
    $sql = "delete from contacts where id=$id";
    return mysqli_query($GLOBALS['conn'],$sql);
}