<?php
include_once '../includes.php';

$limit = 50;
$offset = 0;
$orderBy = 'DESC';
$page = 1;

$maxPageSql = 'SELECT COUNT(*) as count FROM `user`';
$maxPageCount = $connection->query($maxPageSql)->fetch(PDO::FETCH_ASSOC);


if (strtolower($_SERVER['REQUEST_METHOD']) === 'get') {

    if (isset($_GET['limit']) && !empty($_GET['limit'])) {
        $limit = $_GET['limit'];
    }
    if (isset($_GET['offset']) && !empty($_GET['offset'])) {
        $offset = $_GET['offset'];
    }
}

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    echo 'POST !';
    if (isset($_POST['limit_h']) && !empty($_POST['limit_h'])) {
        $limit = $_POST['limit_h'];
    }
    if (isset($_POST['offset_h']) && !empty($_POST['offset_h'])) {
        $offset = $_POST['offset_h'];
    }
    if (isset($_POST['page_h']) && !empty($_POST['page_h'])) {
        $page = $_POST['page_h'];
    }
}


$sql = 'SELECT * FROM `user` ORDER BY id ASC LIMIT ' . $limit . ' OFFSET ' . $offset;
$users = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);


$maxPage = ceil(intval($maxPageCount['count']) / intval($limit));

include_once './template_head.php';
?>

<h2>USERS LIST</h2>

<form method="get" action="./users_list.php">

    <label for="limit">Limit</label>
    <input type="number" id="limit" name="limit" value="50" min="1" max="500">

    <!--    <label for="offset">Offset</label>-->
    <!--    <input type="number" id="offset" name="offset" value="0" min="0" max="500">-->

    <input type="submit" value="Change View">

</form>

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
            <td>
                <div>


                    <a href="../views/user_update.php?id=<?= $user["id"] ?>">
                        <button> Update</button>
                    </a>
            </td>
            </div>
            <td>
            <td>
                <div>
                    <form method="post" action="/src/controllers/user_delete_controller.php?id=<?= $user["id"] ?>">
                        <button>Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<div>

    <?php
    if ($page > 1) {
        ?>
        <div>

            <form method="post" action="./users_list.php">

                <input type="hidden" id="limit_h" name="limit_h" value="<?= $limit ?>">
                <input type="hidden" id="offset_h" name="offset_h" value="<?= (intval($offset) - intval($limit)) ?>">
                <input type="hidden" id="page_h" name="page_h" value="<?= ($page - 1) ?>">


                <button>Précédent</button>
            </form>

        </div>
        <?php
    }
    ?>
    <div><p> Page: <?= $page ?></p></div>

    <?php
    if (($page + 1) <= $maxPage) {
        ?>
        <div>
            <form method="post" action="./users_list.php">

                <input type="hidden" id="limit_h" name="limit_h" value="<?= $limit ?>">
                <input type="hidden" id="offset_h" name="offset_h" value="<?= (intval($offset) + intval($limit)) ?>">
                <input type="hidden" id="page_h" name="page_h" value="<?= ($page + 1) ?>">


                <button>Suivant</button>
            </form>
        </div>
        <?php
    }
    ?>

</div>


</body>
</html>