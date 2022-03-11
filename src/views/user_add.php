<?php
include_once './template_head.php';
?>

<div>
    <h2>ADD A USER</h2>
    <form action="../controllers/user_add_controller.php" method="post">

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name">
        </div>
        <div>
            <label for="gender-male">Male</label>
            <input type="radio" id="gender-male" name="gender" value="male">
            <label for="gender-female">Female</label>
            <input type="radio" id="gender-female" name="gender" value="female">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">
        </div>
        <div>
            <input type="submit" id="add_user" name="add_user" value="Add">
        </div>

    </form>
</div>

</body>
</html>
