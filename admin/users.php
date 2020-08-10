<?php
require '../db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Админ панель | hydrotech-omsk.ru</title>
    <?php include "../assets/css-head.php"; ?>
</head>

<body>
<div>
    <div class="container-fluid">
        <div>
            <?php include "../assets/navbar.php"; ?>
            <hr>
        </div>
        <div class="row sup">
            <?php include 'assets/Admin_navbar.php'; ?>
            <div class="col-md gap">
                <div class="head-main">
                    <p>Администрационная панель -> Список пользователей</p>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-md">
                            <span class="font-italic text-dark">Список пользователей с правами, которые позовляют управлять сайтом.</span>
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Login</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                        $loadUsers = R::findCollection("users");
                                        while ($loadUser = $loadUsers->next()){
                                            echo ' <th scope="row">' . $loadUser->id . '</th>';
                                            echo '<td>' . $loadUser->email . '</td>';
                                            echo '<td>' . $loadUser->login . '</td>';
                                        }
                                    ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
<?php
include "../assets/footer.php";
include "../assets/js-body.php";
?>
</body>

</html>