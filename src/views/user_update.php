<?php
include_once '../includes.php';

if (isset($_GET['id']) && !empty($_GET['id']) ){
    $i = $_GET['id'];

    $sql = 'SELECT * FROM user WHERE id=' . $i ;

    $req = $connection->query($sql)->fetch(PDO::FETCH_ASSOC);

    if( $req === false){
        header( 'Location: ../../index.php');
    }

}
else {
    header( 'Location: ../../index.php');
}

include_once './template_head.php';
?>

    <h2>UPDATE A USER</h2>
    <form action="/src/controllers/user_update_controller.php" method="post">

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= $req['name'] ?>">
        </div>
        <div>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" value="<?= $req['first_name'] ?>">
        </div>
        <div>
            <label for="gender-male">Male</label>
            <input type="radio" id="gender-male" name="gender" value="male" <?php if($req['gender'] === 'male'){ ?> checked <?php } ?>  >
            <label for="gender-female">Female</label>
            <input type="radio" id="gender-female" name="gender" value="female" <?php if($req['gender'] === 'female'){ ?> checked <?php } ?>>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $req['email'] ?>">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= $req['phone'] ?>">
        </div>
        <div>
            <input type="hidden" name="id" id="id" value="<?= $req['id'] ?>">
            <input type="submit" id="update_user" name="update_user" value="Update">
        </div>

    </form>
</div>

</body>
</html>
