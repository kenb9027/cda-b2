<?php

require_once '../includes.php';

if( strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    echo '<h3>Wrong Method</h3>';
    die;
}

if ( isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $sql = 'DELETE FROM `user` WHERE id=:id' ;

    $re = $connection->prepare($sql);
    $re->bindParam(':id' , $id);
    $re->execute();

}

header('Location: ../../index.php');