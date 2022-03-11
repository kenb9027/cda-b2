<?php
include_once './src/includes.php';

$sql = 'SELECT * FROM `user` ORDER BY id DESC LIMIT 20';
$users = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include_once './src/views/template_head.php';
?>


<h2>USERS</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td> <?= $user["id"] ?> </td>
            <td> <?= $user["full_name"] ?> </td>
            <td> <?= $user["email"] ?> </td>
            <td> <?= $user["gender"] ?> </td>
            <td> <?= $user["phone"] ?> </td>
            <td><a href="/src/views/user_update.php?id=<?= $user["id"] ?>">
                    <button> Update</button>
                </a></td>
            <td>
                <form method="post" action="/src/controllers/user_delete_controller.php?id=<?= $user["id"]?>">
                    <button>Delete</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>


</body>
</html>