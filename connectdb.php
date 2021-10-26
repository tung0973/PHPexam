<?php
require ('config.php');

function execute($sql){
    //open connection
    $mysqli = mysqli_connect(HOST, DATABASE , USERNAME , PASSWORD);
    mysqli_set_charset('utf-8');
    //query
    mysqli_query($mysqli, $sql);
    //close connection
    mysqli_close($mysqli);
    global $mysqli ;
}
// lay du lieu
function excuteResult($sql, $isSingle = false){
    $data = null;

    //open connection
    $mysqli = mysqli_connect(HOST, DATABASE , USERNAME , PASSWORD);
    mysqli_set_charset('utf-8');
    //query
    $resultset = mysqli_query($mysqli, $sql);
    if($isSingle){
        $data = mysqli_fetch_array($resultset, 1);
    }else{
        $data = [];
        while(($row = mysqli_fetch_array($resultset,1)) != null){
            $data = $row ;
        }
    }

    //close connection
    mysqli_close($mysqli);
    return $data ;
    global $mysqli ;
}
