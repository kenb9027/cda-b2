<?php

include_once '../includes.php';

if (isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['first_name']) && !empty($_POST['first_name']) &&
    isset($_POST['gender']) && !empty($_POST['gender']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['phone']) && !empty($_POST['phone'])
) {
    $nName = $_POST['name'];
    $nFirstName = $_POST['first_name'];
    $nFullName = $nFirstName . " " . $nName;
    $nEmail = $_POST['email'];
    $nPhone = $_POST['phone'];
    $nGender = $_POST['gender'];

    $exist = false ;
    $verif = 'SELECT email FROM `user` ';
    $mails = $connection->query($verif)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mails as $mail){
        if ($mail['email'] === $nEmail){
            $exist = true ;
        }
    }

    if ($exist === false){
        $req = 'INSERT INTO `user`(`full_name`, `first_name`, `name`, `gender`, `email`, `phone`) 
            VALUES (:full_name,:first_name,:name,:gender,:email,:phone)';

        $res = $connection->prepare($req);
        $res->bindParam(':full_name', $nFullName);
        $res->bindParam(':first_name', $nFirstName);
        $res->bindParam(':name', $nName);
        $res->bindParam(':gender', $nGender);
        $res->bindParam(':email', $nEmail);
        $res->bindParam(':phone', $nPhone);
        $res->execute();
    }
}

header('Location: ../../index.php');
