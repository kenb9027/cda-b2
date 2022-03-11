<?php

include_once '../includes.php';

if (isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['first_name']) && !empty($_POST['first_name']) &&
    isset($_POST['gender']) && !empty($_POST['gender']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['id']) && !empty($_POST['id'])
) {
    $nName = $_POST['name'];
    $nFirstName = $_POST['first_name'];
    $nFullName = $nFirstName . " " . $nName;
    $nEmail = $_POST['email'];
    $nPhone = $_POST['phone'];
    $nGender = $_POST['gender'];
    $id = $_POST['id'];

    $exist = false;
    $verif = 'SELECT id , email FROM `user` ';
    $mails = $connection->query($verif)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mails as $mail) {
        if ($mail['email'] === $nEmail && $mail['id'] != $id) {
            $exist = true;
        }
    }

    if ($exist === false) {
        $req = 'UPDATE `user` 
                SET `full_name`=:full_name,`first_name`=:first_name,`name`=:name,`gender`=:gender,`email`=:email,`phone`=:phone
                WHERE id=:id';

        $res = $connection->prepare($req);
        $res->bindParam(':full_name', $nFullName);
        $res->bindParam(':first_name', $nFirstName);
        $res->bindParam(':name', $nName);
        $res->bindParam(':gender', $nGender);
        $res->bindParam(':email', $nEmail);
        $res->bindParam(':phone', $nPhone);
        $res->bindParam(':id', $id);
        $res->execute();

    }

    header('Location: ../../index.php');


} else {
    header('Location: ../../index.php');

}